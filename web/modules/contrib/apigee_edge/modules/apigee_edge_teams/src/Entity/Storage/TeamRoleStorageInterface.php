<?php

namespace Drupal\apigee_edge_teams\Entity\Storage;

use Drupal\Core\Config\Entity\ConfigEntityStorageInterface;

/**
 * Storage definition for team role entity.
 */
interface TeamRoleStorageInterface extends ConfigEntityStorageInterface {

  /**
   * Changes permissions of a team role.
   *
   * This function can be used to grant and revoke multiple permissions at once.
   *
   * Based on user_role_change_permissions().
   *
   * @param string $role_name
   *   The ID of a team role.
   * @param array $permissions
   *   An associative array, where the key holds the team permission
   *   name and the value determines whether to grant or revoke that permission.
   *   Any value that evaluates to TRUE will cause the team permission to be
   *   granted. Any value that evaluates to FALSE will cause the team permission
   *   to be revoked. Existing team permissions are not changed, unless
   *   specified in $permissions.
   */
  public function changePermissions(string $role_name, array $permissions): void;

}
