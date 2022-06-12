<?php

namespace Drupal\apigee_edge_teams\Routing;

use Drupal\apigee_edge_teams\TeamContextManagerInterface;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Adds the _apigee_team_route option to developer (user) routes.
 *
 * @see \Drupal\apigee_edge_teams\TeamContextManager::getCorrespondingRouteNameForEntity()
 */
final class TeamContextSwitcherRouteAlterSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    foreach ($collection as $id => $route) {
      // Add a corresponding team route if the team route defines a
      // corresponding developer route.
      if (($developer_route_id = $route->getOption(TeamContextManagerInterface::DEVELOPER_ROUTE_OPTION_NAME)) && ($developer_route = $collection->get($developer_route_id)) && empty($developer_route->getOption(TeamContextManagerInterface::TEAM_ROUTE_OPTION_NAME))) {
        $developer_route->setOption(TeamContextManagerInterface::TEAM_ROUTE_OPTION_NAME, $id);
      }
    }
  }

}
