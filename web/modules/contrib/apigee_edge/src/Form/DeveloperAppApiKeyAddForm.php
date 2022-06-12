<?php

namespace Drupal\apigee_edge\Form;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Entity\Form\DeveloperAppFormTrait;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\user\UserInterface;

/**
 * Provides API key add form for developer app.
 */
class DeveloperAppApiKeyAddForm extends AppApiKeyAddFormBase {

  use DeveloperAppFormTrait, DeveloperAppCredentialFormTrait;

  /**
   * The user from route.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ?AppInterface $app = NULL, ?UserInterface $user = NULL) {
    $this->user = $user;
    return parent::buildForm($form, $form_state, $app);
  }

  /**
   * {@inheritdoc}
   */
  protected function getAppOwner(): string {
    return $this->user->getEmail();
  }

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl(): Url {
    return $this->getCancelUrl();
  }

}
