<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\AppCredentialController as EdgeAppCredentialController;
use Apigee\Edge\Api\Management\Controller\CompanyAppCredentialController;
use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerBase;
use Drupal\apigee_edge\Event\AbstractAppCredentialEvent;

/**
 * Definition of the team app credential controller service.
 *
 * This integrates the Management API's Company app credential controller
 * from the SDK's with Drupal.
 */
final class TeamAppCredentialController extends AppCredentialControllerBase implements TeamAppCredentialControllerInterface {

  /**
   * {@inheritdoc}
   */
  protected function decorated(): EdgeAppCredentialController {
    if (!isset($this->instances[$this->owner][$this->appName])) {
      $this->instances[$this->owner][$this->appName] = new CompanyAppCredentialController($this->connector->getOrganization(), $this->owner, $this->appName, $this->connector->getClient());
    }
    return $this->instances[$this->owner][$this->appName];
  }

  /**
   * {@inheritdoc}
   */
  protected function getAppType(): string {
    return AbstractAppCredentialEvent::APP_TYPE_TEAM;
  }

}
