<?php

namespace Drupal\apigee_edge\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form for saving the error page title and content.
 */
class ErrorPageSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_error_page_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'apigee_edge.error_page',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('apigee_edge.error_page');

    $form['error_page'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Title and content displayed on error page'),
      '#collapsible' => FALSE,
    ];

    $form['error_page']['error_page_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Error page title'),
      '#default_value' => $config->get('error_page_title'),
    ];

    $form['error_page']['error_page_content'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Error page content'),
      '#format' => $config->get('error_page_content.format'),
      '#default_value' => $config->get('error_page_content.value'),
    ];

    $form['error_page']['error_page_debug_messages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show debug messages.'),
      '#description' => $this->t('If checked, additional debug messages will be displayed on the error page. This can be turned off on production.'),
      '#default_value' => $config->get('error_page_debug_messages'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('apigee_edge.error_page')
      ->set('error_page_title', $form_state->getValue('error_page_title'))
      ->set('error_page_content.format', $form_state->getValue(['error_page_content', 'format']))
      ->set('error_page_content.value', $form_state->getValue(['error_page_content', 'value']))
      ->set('error_page_debug_messages', $form_state->getValue('error_page_debug_messages'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
