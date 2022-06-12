<?php

namespace Drupal\apigee_edge\Form;

use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;

/**
 * Provides form trait for developer app credential.
 */
trait DeveloperAppCredentialFormTrait {

  /**
   * {@inheritdoc}
   */
  protected function appCredentialController(string $owner, string $app_name): AppCredentialControllerInterface {
    return \Drupal::service('apigee_edge.controller.developer_app_credential_factory')->developerAppCredentialController($owner, $app_name);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->app->toUrl('canonical-by-developer');
  }

}
