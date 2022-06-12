<?php

namespace Drupal\apigee_edge_teams\Entity;

use Symfony\Component\Routing\Route;

/**
 * Contains utility methods for team and team app routes.
 */
trait TeamRoutingHelperTrait {

  /**
   * If route contains the {team} parameter add required changes to the route.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   The route to be checked and altered if needed.
   */
  private function ensureTeamParameter(Route $route) {
    if (strpos($route->getPath(), '{team}') !== FALSE) {
      // Make sure the parameter gets up-casted.
      // (This also ensures that we get an "Page not found" page if user with
      // uid does not exist.)
      $route->setOption('parameters', ['team' => ['type' => 'entity:team', 'converter' => 'paramconverter.entity']]);
    }
  }

}
