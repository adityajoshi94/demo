<?php

namespace Drupal\apigee_edge\Form;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Displays the analytics page of a developer app for a given user on the UI.
 */
class DeveloperAppAnalyticsFormForDeveloper extends DeveloperAppAnalyticsForm {

  // @codingStandardsIgnoreStart
  /**
   * {@inheritdoc}
   *
   * This override here is important because the name of the third parameter is
   * different. This way, Drupal's routing system can correctly identify it and
   * pass the parameter from the URL.
   */
  public function buildForm(array $form, FormStateInterface $form_state, ?AppInterface $app = NULL) {
    // Pass the "app" (!= developer_app) from the route to the parent.
    return parent::buildForm($form, $form_state, $app);
  }
  // @codingStandardsIgnoreEnd

}
