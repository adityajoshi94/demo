<?php

namespace Drupal\apigee_edge\Form;

use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides revoke confirmation base form for app API key.
 */
abstract class AppApiKeyRevokeFormBase extends AppApiKeyConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure that you want to revoke the API key %key?', [
      '%key' => $this->consumerKey,
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Revoke');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_app_api_key_revoke_form';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $args = [
      '%key' => $this->consumerKey,
      '@app' => $this->app->label(),
    ];

    try {
      $this->appCredentialController($this->app->getAppOwner(), $this->app->getName())->setStatus($this->consumerKey, AppCredentialControllerInterface::STATUS_REVOKE);
      Cache::invalidateTags($this->app->getCacheTags());
      $this->messenger()->addStatus($this->t('API key %key revoked from @app.', $args));
    }
    catch (\Exception $exception) {
      $this->messenger()->addError($this->t('Failed to revoke API key %key from @app.', $args));
    }

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
