<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Entity access handler for team roles.
 */
class TeamRoleAccessHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\apigee_edge_teams\Entity\TeamRoleInterface $entity */
    if ($operation === 'delete' && $entity->isLocked()) {
      return AccessResult::forbidden('Team role is locked.')->cachePerUser();
    }

    return parent::checkAccess($entity, $operation, $account);
  }

}
