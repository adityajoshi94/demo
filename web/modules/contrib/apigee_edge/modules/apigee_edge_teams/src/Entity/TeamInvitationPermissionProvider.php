<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\entity\EntityPermissionProvider;

/**
 * Provides permission for team_invitation.
 */
class TeamInvitationPermissionProvider extends EntityPermissionProvider {

  /**
   * {@inheritdoc}
   */
  public function buildPermissions(EntityTypeInterface $entity_type) {
    $permissions['administer team_invitation'] = [
      'title' => $this->t('Administer team invitation settings'),
      'provider' => 'apigee_edge_teams',
      'restrict access' => TRUE,
    ];

    $permissions['accept own team invitation'] = [
      'title' => $this->t('Accept own team invitation'),
      'provider' => 'apigee_edge_teams',
    ];

    $permissions['accept any team invitation'] = [
      'title' => $this->t('Accept any team invitation'),
      'provider' => 'apigee_edge_teams',
      'restrict access' => TRUE,
    ];

    $permissions['decline own team invitation'] = [
      'title' => $this->t('Decline own team invitation'),
      'provider' => 'apigee_edge_teams',
    ];

    $permissions['decline any team invitation'] = [
      'title' => $this->t('Decline any team invitation'),
      'provider' => 'apigee_edge_teams',
      'restrict access' => TRUE,
    ];

    return $permissions;
  }

}
