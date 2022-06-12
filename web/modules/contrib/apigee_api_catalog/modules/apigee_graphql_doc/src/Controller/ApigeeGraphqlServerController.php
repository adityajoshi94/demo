<?php

namespace Drupal\apigee_graphql_doc\Controller;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Drupal\node\NodeInterface;
use GraphQL\GraphQL;
use GraphQL\Utils\BuildSchema;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Returns responses for GraphQL for Apigee routes.
 */
class ApigeeGraphqlServerController extends ControllerBase {

  /**
   * Builds the response for the mockserver.
   *
   * @param Drupal\node\NodeInterface $node
   *   The graphql node.
   */
  public function build(NodeInterface $node) {

    try {
      if ($node->bundle() != 'graphql_doc' && $node->get('field_graphql_spec_source_type')->value != 'file') {
        return new JsonResponse('Error');
      }
      $field_graphql_spec = $node->get('field_graphql_spec');

      if ($field_graphql_spec && $field_graphql_spec->target_id) {
        /** @var \Drupal\file\Entity\File $file */
        $file = File::load($field_graphql_spec->target_id);

        if ($file) {
          $schema_url = $file->getFileUri();
          $contents = file_get_contents($schema_url);
          $schema = BuildSchema::build($contents);

          $rawInput = \Drupal::request()->getContent();
          $input = Json::decode((string) $rawInput);
          $query = $input['query'];
          $variableValues = $input['variables'] ?? NULL;

          $rootValue = ['prefix' => 'You said: '];
          $result = GraphQL::executeQuery($schema, $query, $rootValue, NULL, $variableValues)->toArray();
          return new JsonResponse($result);
        }
      }

    }
    catch (Throwable $e) {
      $output = [
        'error' => [
          'message' => $e->getMessage(),
        ],
      ];
    }
  }

}
