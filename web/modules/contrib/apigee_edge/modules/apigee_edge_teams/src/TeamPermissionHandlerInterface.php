<?php

namespace Drupal\apigee_edge_teams;

use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines an interface to list available team permissions.
 *
 * Based on Drupal core's PermissionHandlerInterface.
 *
 * @see \Drupal\user\PermissionHandlerInterface
 */
interface TeamPermissionHandlerInterface {

  /**
   * Gets all available team permissions.
   *
   * @return \Drupal\apigee_edge_teams\Structure\TeamPermission[]
   *   Array of team permissions.
   */
  public function getPermissions(): array;

  /**
   * Returns team permissions of a developer within a team.
   *
   * @param \Drupal\apigee_edge_teams\Entity\TeamInterface $team
   *   The team entity, the developer is not necessarily member of the team.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return array
   *   Array of team permissions names.
   *
   * @throws \Drupal\apigee_edge_teams\Exception\InvalidArgumentException
   */
  public function getDeveloperPermissionsByTeam(TeamInterface $team, AccountInterface $account): array;

}
