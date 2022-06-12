<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Entity\FieldableEntityInterface as DrupalFieldableEntityInterface;

/**
 * Base interface for those Apigee Edge entities that are fieldable.
 *
 * Fieldable means that they have field UI support and they expose their
 * properties as base fields.
 *
 * According to DrupalFieldableEntityInterface's description \IteratorAggregate
 * should be implemented.
 */
interface FieldableEdgeEntityInterface extends EdgeEntityInterface, \IteratorAggregate, DrupalFieldableEntityInterface {

  /**
   * Updates the property value on an entity by field name.
   *
   * @param string $field_name
   *   Name of the field (which usually the name of the property.)
   * @param mixed $value
   *   Value of the field.
   */
  public function setPropertyValue(string $field_name, $value): void;

}
