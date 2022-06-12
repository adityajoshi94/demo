<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;

/**
 * Provides form trait for team app API key.
 */
trait TeamAppApiKeyFormTrait {

  /**
   * {@inheritdoc}
   */
  protected function appCredentialController(string $owner, string $app_name): AppCredentialControllerInterface {
    return \Drupal::service('apigee_edge_teams.controller.team_app_credential_controller_factory')->teamAppCredentialController($owner, $app_name);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->app->toUrl();
  }

}
