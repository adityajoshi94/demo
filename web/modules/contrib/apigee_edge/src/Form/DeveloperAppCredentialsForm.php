<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing Developer app credentials related settings.
 */
class DeveloperAppCredentialsForm extends AppCredentialsConfigForm {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'apigee_edge.developer_app_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_developer_app_credentials_form';
  }

}
