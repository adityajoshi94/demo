<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider;

/**
 * Default route provider for Apigee Edge entities.
 */
class EdgeEntityRouteProvider extends DefaultHtmlRouteProvider {

  /**
   * {@inheritdoc}
   */
  protected function getCanonicalRoute(EntityTypeInterface $entity_type) {
    $route = parent::getCanonicalRoute($entity_type);
    if ($route) {
      $route->setDefault('_title_callback', EdgeEntityTitleProvider::class . '::title');
    }
    return $route;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditFormRoute(EntityTypeInterface $entity_type) {
    $route = parent::getEditFormRoute($entity_type);
    if ($route) {
      $route->setDefault('_title_callback', EdgeEntityTitleProvider::class . '::editTitle');
      // We must load the entity from Apigee Edge directly and omit cached
      // version on edit forms.
      $route->setOption('apigee_edge_load_unchanged_entity', 'true');

    }
    return $route;
  }

  /**
   * {@inheritdoc}
   */
  protected function getDeleteFormRoute(EntityTypeInterface $entity_type) {
    $route = parent::getDeleteFormRoute($entity_type);
    if ($route) {
      $route->setDefault('_title_callback', EdgeEntityTitleProvider::class . '::deleteTitle');
    }
    return $route;
  }

}
