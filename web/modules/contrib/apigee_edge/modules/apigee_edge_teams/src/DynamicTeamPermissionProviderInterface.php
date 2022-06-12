<?php

namespace Drupal\apigee_edge_teams;

/**
 * Allows modules to provide dynamic team permissions.
 *
 * @see \Drupal\apigee_edge_teams\Entity\TeamAppPermissionProvider
 */
interface DynamicTeamPermissionProviderInterface {

  /**
   * Returns team permissions provided by a module.
   *
   * @return \Drupal\apigee_edge_teams\Structure\TeamPermission[]
   *   Array of team permissions.
   *
   * @see \Drupal\apigee_edge_teams\TeamPermissionHandlerInterface
   */
  public function permissions(): array;

}
