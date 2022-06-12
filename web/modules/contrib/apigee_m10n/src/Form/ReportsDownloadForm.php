<?php

namespace Drupal\apigee_m10n\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\UserInterface;

/**
 * Defines the reports download form for developer.
 */
class ReportsDownloadForm extends ReportsDownloadFormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, UserInterface $user = NULL) {
    return $this->getForm($form, $form_state, $user);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntityId(): string {
    return $this->entity->getEmail();
  }

}
