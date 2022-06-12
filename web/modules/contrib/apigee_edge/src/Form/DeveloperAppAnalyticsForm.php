<?php

namespace Drupal\apigee_edge\Form;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Displays the analytics page of a developer app on the UI.
 */
class DeveloperAppAnalyticsForm extends AppAnalyticsFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_developer_app_analytics';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ?AppInterface $developer_app = NULL) {
    // Pass the "developer_app" (!= app) from the route to the parent.
    return parent::buildForm($form, $form_state, $developer_app);
  }

  /**
   * {@inheritdoc}
   */
  protected function getAnalyticsFilterCriteriaByAppOwner(AppInterface $app) : string {
    $developer = $this->entityTypeManager->getStorage('developer')->load($app->getAppOwner());
    return "developer_email eq '{$developer->id()}'";
  }

}
