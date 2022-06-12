<?php

namespace Drupal\apigee_edge\Entity\Storage;

/**
 * Storage for fieldable Edge entities that supports attributes.
 */
abstract class AttributesAwareFieldableEdgeEntityStorageBase extends FieldableEdgeEntityStorageBase implements AttributesAwareFieldableEdgeEntityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function countFieldData($storage_definition, $as_bool = FALSE) {
    /** @var \Drupal\Core\Field\FieldStorageDefinitionInterface $storage_definition */
    $count = 0;
    /** @var \Apigee\Edge\Entity\Property\AttributesPropertyInterface[] $entities */
    $entities = $this->loadMultiple();
    foreach ($entities as $entity) {
      if ($entity->getAttributeValue($storage_definition->getName()) !== NULL) {
        $count++;
      }
    }

    return $as_bool ? (bool) $count : $count;
  }

}
