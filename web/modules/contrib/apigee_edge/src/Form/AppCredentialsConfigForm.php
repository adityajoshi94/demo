<?php

namespace Drupal\apigee_edge\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base config form for app credentials related settings.
 */
abstract class AppCredentialsConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config($this->getConfigName());
    $form['wrapper'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Credential lifetime'),
      '#collapsible' => FALSE,
    ];

    // The value of -1 indicates no set expiry. But the value of 0 is not
    // acceptable by the server (InvalidValueForExpiresIn),
    // so 0 is transformed to -1 while saving the developer app.
    $form['wrapper']['credential_lifetime'] = [
      '#type' => 'number',
      '#title' => $this->t('Default API key lifetime in days'),
      '#default_value' => $config->get('credential_lifetime'),
      '#description' => $this->t('When an app is newly-created, this is the default number of days until its API Key expires. A value of 0 indicates no set expiry.'),
      '#min' => 0,
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config($this->getConfigName())
      ->set('credential_lifetime', $form_state->getValue('credential_lifetime'))
      ->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * Returns the name of the config that contains the app credential settings.
   *
   * @return string
   *   The name of the config.
   */
  final protected function getConfigName(): string {
    $configs = $this->getEditableConfigNames();
    return reset($configs);
  }

}
