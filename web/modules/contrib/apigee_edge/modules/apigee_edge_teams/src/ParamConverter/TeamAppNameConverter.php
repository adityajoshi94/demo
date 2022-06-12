<?php

namespace Drupal\apigee_edge_teams\ParamConverter;

use Drupal\apigee_edge\Entity\Storage\AppStorage;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Drupal\Core\ParamConverter\ParamConverterInterface;
use Symfony\Component\Routing\Route;

/**
 * Resolves "team_app_by_name" type parameters in routes.
 *
 * @see \Drupal\apigee_edge_teams\Entity\TeamApp::urlRouteParameters()
 * @see \Drupal\apigee_edge_teams\Routing\TeamAppByNameRouteAlterSubscriber
 */
final class TeamAppNameConverter implements ParamConverterInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The logger.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  private $logger;

  /**
   * Constructs a TeamAppNameConverter.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity type manager.
   * @param \Drupal\Core\Logger\LoggerChannelInterface $logger
   *   The logger.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, LoggerChannelInterface $logger) {
    $this->entityTypeManager = $entity_type_manager;
    $this->logger = $logger;
  }

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    if (empty($defaults['team'])) {
      return NULL;
    }
    $entity = NULL;
    /** @var \Drupal\apigee_edge_teams\Entity\TeamInterface $team */
    // If {team} parameter is before the {team_app} in the route then
    // entity parameter converter should have already up-casted it to
    // a team object if not then let's try to up-cast it here.
    $team = is_object($defaults['team']) ? $defaults['team'] : $this->entityTypeManager->getStorage('team')->load($defaults['team']);
    if ($team) {
      $app_storage = $this->entityTypeManager->getStorage('team_app');
      $app_ids = $app_storage->getQuery()
        ->condition('companyName', $team->id())
        ->condition('name', $value)
        ->execute();
      if (!empty($app_ids)) {
        $app_id = reset($app_ids);
        // Load the entity directly from Apigee Edge if needed.
        // @see \Drupal\apigee_edge\ParamConverter\ApigeeEdgeLoadUnchangedEntity
        if (!empty($defaults['_route_object']->getOption('apigee_edge_load_unchanged_entity'))) {
          if ($app_storage instanceof AppStorage) {
            $entity = $app_storage->loadUnchangedByUuid($app_id);
          }
          else {
            $entity = $app_storage->loadUnchanged($app_id);
          }
        }
        else {
          $entity = $app_storage->load($app_id);
        }
      }

      if ($entity === NULL) {
        // App may have been deleted on Apigee Edge, that is a smaller
        // problem.
        $this->logger->error('%class: Unable to load team app with %name name owned by %team team.', [
          '%class' => get_called_class(),
          '%name' => $value,
          '%team' => $team->id(),
        ]);
      }
    }

    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route) {
    return (!empty($definition['type']) && $definition['type'] == 'team_app_by_name');
  }

}
