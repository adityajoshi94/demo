<?php

namespace Drupal\apigee_graphql_doc\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'GraphiQL' formatter.
 *
 * @FieldFormatter(
 *   id = "apigee_graphql_doc_graphiql",
 *   label = @Translation("GraphiQL"),
 *   field_types = {
 *     "file_link"
 *   }
 * )
 */
class GraphiqlFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'apigee_graphql_doc_file_link_field_item',
        '#field_name' => $this->fieldDefinition->getName(),
        '#delta' => $delta,
      ];
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function view(FieldItemListInterface $items, $langcode = NULL) {
    $element = parent::view($items, $langcode);

    $graphql_urls = [];
    foreach ($items as $delta => $item) {
      /** @var \Drupal\link\Plugin\Field\FieldType\LinkItem $item */
      // Not validating URLs or paths.
      $graphql_urls[] = $item->getUrl()->toString();
    }

    return $this->attachLibraries($element, $graphql_urls);
  }

  /**
   * Helper function to attach library definitions and pass JavaScript settings.
   *
   * @param array $element
   *   A renderable array of the field element.
   * @param array $graphql_urls
   *   An array of GraphQL Urls.
   *
   * @return array
   *   A renderable array of the field element with attached libraries.
   */
  private function attachLibraries(array $element, array $graphql_urls) {
    if (!empty($graphql_urls)) {
      $element['#attached'] = [
        'library' => [
          'apigee_graphql_doc/reactjs',
          'apigee_graphql_doc/graphiql',
          'apigee_graphql_doc/apigee_graphql_doc_integration',
        ],
        'drupalSettings' => [
          'apigeeGraphqlDocFormatter' => [
            $this->fieldDefinition->getName() => [
              'graphqlUrls' => $graphql_urls,
            ],
          ],
        ],
      ];
    }
    return $element;
  }

}
