<?php

namespace Drupal\apigee_edge\Entity\Storage;

use Drupal\Core\Entity\DynamicallyFieldableEntityStorageInterface;
use Drupal\Core\Entity\FieldableEntityStorageInterface as DrupalFieldableEntityStorageInterface;
use Drupal\Core\Entity\Schema\DynamicallyFieldableEntityStorageSchemaInterface;

/**
 * Defines an interface for fieldable Apigee Edge entities.
 *
 * Fieldable means that they have field UI support and they expose their
 * properties as base fields.
 */
interface FieldableEdgeEntityStorageInterface extends EdgeEntityStorageInterface, DrupalFieldableEntityStorageInterface, DynamicallyFieldableEntityStorageInterface, DynamicallyFieldableEntityStorageSchemaInterface {

}
