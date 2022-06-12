<?php

namespace Drupal\apigee_edge_teams;

use Drupal\views\EntityViewsData;

/**
 * Provides views data for the team_invitation entity type.
 */
class TeamInvitationViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Set the filter for status field.
    $data['team_invitation']['status']['filter']['id'] = 'team_invitation_status';

    // Provide relationship to user table via mail.
    $data['team_invitation']['recipient']['relationship']['id'] = 'standard';
    $data['team_invitation']['recipient']['relationship']['base'] = 'users_field_data';
    $data['team_invitation']['recipient']['relationship']['base field'] = 'mail';
    $data['team_invitation']['recipient']['relationship']['title'] = $this->t('User');
    $data['team_invitation']['nid']['relationship']['label'] = $this->t('Links the recipient to a user.');

    return $data;
  }

}
