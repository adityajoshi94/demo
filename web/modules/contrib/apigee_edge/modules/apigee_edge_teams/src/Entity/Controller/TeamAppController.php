<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\AppByOwnerControllerInterface as EdgeAppByOwnerControllerInterface;
use Apigee\Edge\Api\Management\Controller\CompanyAppController as EdgeCompanyAppController;
use Drupal\apigee_edge\Entity\Controller\AppByOwnerController;

/**
 * Definition of the Team app controller service.
 *
 * We call company apps as team apps in Drupal.
 */
final class TeamAppController extends AppByOwnerController implements TeamAppControllerInterface {

  /**
   * {@inheritdoc}
   */
  protected function decorated(): EdgeAppByOwnerControllerInterface {
    if (!isset($this->instances[$this->owner])) {
      $this->instances[$this->owner] = new EdgeCompanyAppController($this->connector->getOrganization(), $this->owner, $this->connector->getClient(), NULL, $this->organizationController);
    }
    return $this->instances[$this->owner];
  }

  /**
   * {@inheritdoc}
   */
  public function getCompanyName(): string {
    /** @var \Apigee\Edge\Api\Management\Controller\CompanyAppControllerInterface $decorated */
    $decorated = $this->decorated();
    return $decorated->getCompanyName();
  }

}
