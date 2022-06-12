<?php

namespace Drupal\apigee_edge\Routing;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Registers the 'type' of the 'app' route parameter if 'user' is available.
 *
 * The {developer_app} parameter can be automatically resolved by
 * EntityResolverManager, but in that case the value of in the path is the app
 * id (UUID) and not the name of an app.
 *
 * @see \Drupal\apigee_edge\Entity\DeveloperApp::urlRouteParameters()
 * @see \Drupal\apigee_edge\ParamConverter\DeveloperAppNameConverter
 */
final class DeveloperAppByNameRouteAlterSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    foreach ($collection as $id => $route) {
      if (strpos($id, 'entity.developer_app') !== FALSE && in_array('user', $route->compile()->getPathVariables()) && in_array('app', $route->compile()->getPathVariables())) {
        $params = $route->getOption('parameters') ?? [];
        NestedArray::setValue($params, ['app', 'type'], 'developer_app_by_name');
        $route->setOption('parameters', $params);
      }
    }
  }

}
