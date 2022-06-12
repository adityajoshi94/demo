<?php

namespace Drupal\apigee_edge_teams;

use Drupal\apigee_edge\Entity\ApiProductInterface;
use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Base definition of the team member API product access handler.
 *
 * This handles API product access on the team-level instead of the
 * user-level like entity access does. It allows to grant or revoke a team
 * member's access to an API product.
 */
interface TeamMemberApiProductAccessHandlerInterface {

  /**
   * Checks access to an operation on a given API product.
   *
   * @param \Drupal\apigee_edge\Entity\ApiProductInterface $api_product
   *   The API Product entity for which to check access.
   * @param string $operation
   *   The operation access should be checked for.
   *   Usually one of "view", "view label", "update", "delete" or "assign".
   * @param \Drupal\apigee_edge_teams\Entity\TeamInterface $team
   *   The team for which to check access.
   * @param \Drupal\Core\Session\AccountInterface|null $account
   *   (optional) The user for which to check access, default is the
   *   current user.
   * @param bool $return_as_object
   *   (optional) Defaults to FALSE.
   *
   * @return bool|\Drupal\Core\Access\AccessResultInterface
   *   The access result. Returns a boolean if $return_as_object is FALSE (this
   *   is the default) and otherwise an AccessResultInterface object.
   *   When a boolean is returned, the result of AccessInterface::isAllowed() is
   *   returned, i.e. TRUE means access is explicitly allowed, FALSE means
   *   access is either explicitly forbidden or "no opinion".
   */
  public function access(ApiProductInterface $api_product, string $operation, TeamInterface $team, AccountInterface $account = NULL, bool $return_as_object = FALSE);

  /**
   * Clears all cached access checks.
   */
  public function resetCache(): void;

}
