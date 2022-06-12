<?php

namespace Drupal\apigee_edge\Entity\Enhancer;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\Core\Routing\EnhancerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Route enhancer for team apps.
 *
 * Sets "_entity" on app routes that contain app names ({app}) instead of app
 * ids ({developer_app} or {team_app}).
 * EntityRouteEnhancer can not do this because it expects that route
 * parameter's name matches with the name of the entity type.
 *
 * @see \Drupal\Core\Entity\Enhancer\EntityRouteEnhancer
 */
class AppRouteEnhancer implements EnhancerInterface {

  /**
   * {@inheritdoc}
   */
  public function enhance(array $defaults, Request $request) {
    // The {app} route parameter gets up-casted to an app entity
    // by app by name converters. For example: DeveloperAppNameConverter.
    // @see \Drupal\apigee_edge\ParamConverter\DeveloperAppNameConverter
    if (!isset($defaults['_entity']) && isset($defaults['app']) && is_object($defaults['app']) && $defaults['app'] instanceof AppInterface) {
      // Required by entity view controllers and title callbacks for example.
      // @see \Drupal\Core\Entity\Enhancer\EntityRouteEnhancer::enhanceEntityView()
      // @see \Drupal\Core\Entity\Controller\EntityViewController::view()
      // @see \Drupal\Core\Entity\Controller\EntityController::doGetEntity()
      $defaults['_entity'] = &$defaults['app'];
    }

    return $defaults;
  }

}
