<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Form\EdgeEntityCacheConfigFormBase;

/**
 * Provides a form for changing Team app caching related settings.
 */
class TeamAppCacheForm extends EdgeEntityCacheConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['apigee_edge_teams.team_app_settings'];
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntityType(): string {
    return 'team_app';
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_teams_team_app_caching_form';
  }

}
