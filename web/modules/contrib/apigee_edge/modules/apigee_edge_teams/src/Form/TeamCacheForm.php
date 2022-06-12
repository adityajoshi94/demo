<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Form\EdgeEntityCacheConfigFormBase;

/**
 * Provides a form for changing Team caching related settings.
 */
class TeamCacheForm extends EdgeEntityCacheConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['apigee_edge_teams.team_settings'];
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntityType(): string {
    return 'team';
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_teams_team_caching_form';
  }

}
