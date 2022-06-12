<?php

namespace Drupal\apigee_edge_teams\Entity;

use Apigee\Edge\Api\Management\Entity\CompanyInterface;
use Drupal\apigee_edge\Entity\AttributesAwareFieldableEdgeEntityBaseInterface;

/**
 * Defines an interface for Team entity objects.
 */
interface TeamInterface extends CompanyInterface, AttributesAwareFieldableEdgeEntityBaseInterface {

  /**
   * Set status of the team.
   *
   * @param string $status
   *   Status of the entity.
   */
  public function setStatus(string $status): void;

}
