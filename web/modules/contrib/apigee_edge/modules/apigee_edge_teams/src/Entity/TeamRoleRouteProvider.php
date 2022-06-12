<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\entity\Routing\DefaultHtmlRouteProvider;

/**
 * Route provider for team roles.
 */
class TeamRoleRouteProvider extends DefaultHtmlRouteProvider {

  /**
   * {@inheritdoc}
   */
  protected function getCollectionRoute(EntityTypeInterface $entity_type) {
    $route = parent::getCollectionRoute($entity_type);
    if ($route) {
      $defaults = $route->getDefaults();
      unset($defaults['_title_callback']);
      $defaults['_title'] = 'Roles';
      $route->setDefaults($defaults);
    }
    return $route;
  }

}
