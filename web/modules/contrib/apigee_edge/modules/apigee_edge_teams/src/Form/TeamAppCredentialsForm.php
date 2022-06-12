<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Form\AppCredentialsConfigForm;

/**
 * Provides a form for changing Team app credentials related settings.
 */
class TeamAppCredentialsForm extends AppCredentialsConfigForm {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['apigee_edge_teams.team_app_settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_team_credentials_form';
  }

}
