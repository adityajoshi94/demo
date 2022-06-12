<?php

namespace Drupal\apigee_edge\Entity;

use Apigee\Edge\Api\Management\Entity\DeveloperAppInterface as EdgeDeveloperAppInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Defines an interface for developer app entity objects.
 */
interface DeveloperAppInterface extends EdgeDeveloperAppInterface, AppInterface, EntityOwnerInterface {

}
