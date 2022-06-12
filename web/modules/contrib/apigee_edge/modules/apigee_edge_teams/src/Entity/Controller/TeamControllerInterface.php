<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\CompanyControllerInterface as EdgeCompanyControllerInterface;

/**
 * Base definition of the Team controller service in Drupal.
 *
 * We call companies as teams in Drupal.
 */
interface TeamControllerInterface extends EdgeCompanyControllerInterface {

}
