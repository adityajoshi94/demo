<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\CompanyAppControllerInterface as EdgeCompanyAppControllerInterface;

/**
 * Base definition of the Team app controller service in Drupal.
 *
 * We call company apps as team apps in Drupal.
 */
interface TeamAppControllerInterface extends EdgeCompanyAppControllerInterface {

}
