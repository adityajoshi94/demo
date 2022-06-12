<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\AppByOwnerControllerInterface as EdgeAppByOwnerControllerInterface;
use Apigee\Edge\Api\Management\Controller\DeveloperAppController as EdgeDeveloperAppController;

/**
 * Definition of the developer app controller service.
 *
 * This integrates the Management API's developer app controller from the
 * SDK's with Drupal. It uses a shared (not internal) app cache to reduce the
 * number of API calls that we send to Apigee Edge.
 */
final class DeveloperAppController extends AppByOwnerController implements DeveloperAppControllerInterface {

  /**
   * {@inheritdoc}
   */
  protected function decorated(): EdgeAppByOwnerControllerInterface {
    if (!isset($this->instances[$this->owner])) {
      $this->instances[$this->owner] = new EdgeDeveloperAppController($this->connector->getOrganization(), $this->owner, $this->connector->getClient(), NULL, $this->organizationController);
    }
    return $this->instances[$this->owner];
  }

}
