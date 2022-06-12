<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\DeveloperAppCredentialControllerInterface as EdgeDeveloperAppCredentialControllerInterface;
use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;

/**
 * Base definition of the team app credential controllers in Drupal.
 */
interface TeamAppCredentialControllerInterface extends AppCredentialControllerInterface, EdgeDeveloperAppCredentialControllerInterface {

}
