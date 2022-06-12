<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\AppCredentialController as EdgeAppCredentialController;
use Apigee\Edge\Api\Management\Controller\DeveloperAppCredentialController as EdgeDeveloperAppCredentialController;
use Drupal\apigee_edge\Event\AbstractAppCredentialEvent;

/**
 * Definition of the developer app credential controller service.
 *
 * This integrates the Management API's Developer app credential controller
 * from the SDK's with Drupal.
 */
final class DeveloperAppCredentialController extends AppCredentialControllerBase implements DeveloperAppCredentialControllerInterface {

  /**
   * {@inheritdoc}
   */
  protected function decorated(): EdgeAppCredentialController {
    if (!isset($this->instances[$this->owner][$this->appName])) {
      $this->instances[$this->owner][$this->appName] = new EdgeDeveloperAppCredentialController($this->connector->getOrganization(), $this->owner, $this->appName, $this->connector->getClient());
    }
    return $this->instances[$this->owner][$this->appName];
  }

  /**
   * {@inheritdoc}
   */
  protected function getAppType(): string {
    return AbstractAppCredentialEvent::APP_TYPE_DEVELOPER;
  }

}
