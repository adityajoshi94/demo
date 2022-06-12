<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Api\Management\Controller\DeveloperAppCredentialControllerInterface as EdgeDeveloperAppCredentialControllerInterface;

/**
 * Base definition of the developer app credential controllers in Drupal.
 */
interface DeveloperAppCredentialControllerInterface extends AppCredentialControllerInterface, EdgeDeveloperAppCredentialControllerInterface {

}
