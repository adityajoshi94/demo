<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Structure\AttributesProperty;

/**
 * Helper trait for those entity controllers that supports attribute CRUDL.
 *
 * This trait ensures that the right entity cache method(s) gets called when
 * a CRUD method is called.
 *
 * @see \Apigee\Edge\Api\Management\Controller\AttributesAwareEntityControllerInterface
 */
trait CachedAttributesAwareEntityControllerTrait {

  use EntityCacheAwareControllerTrait;

  /**
   * The decorated entity controller from the SDK.
   *
   * We did not added a return type because this way all entity controller's
   * decorated() method becomes compatible with this declaration.
   *
   * @return \Apigee\Edge\Api\Management\Controller\AttributesAwareEntityControllerInterface
   *   An entity controller that extends this interface.
   */
  abstract protected function decorated();

  /**
   * {@inheritdoc}
   */
  public function getAttributes(string $entity_id): AttributesProperty {
    $entity = $this->entityCache()->getEntity($entity_id);
    /** @var \Apigee\Edge\Entity\Property\AttributesPropertyInterface $entity */
    if ($entity) {
      return $entity->getAttributes();
    }

    return $this->decorated()->getAttributes($entity_id);
  }

  /**
   * {@inheritdoc}
   */
  public function getAttribute(string $entity_id, string $name): string {
    $entity = $this->entityCache()->getEntity($entity_id);
    /** @var \Apigee\Edge\Entity\Property\AttributesPropertyInterface $entity */
    if ($entity) {
      return $entity->getAttributeValue($name);
    }

    return $this->decorated()->getAttribute($entity_id, $name);
  }

  /**
   * {@inheritdoc}
   */
  public function updateAttributes(string $entity_id, AttributesProperty $attributes): AttributesProperty {
    $attributes = $this->decorated()->updateAttributes($entity_id, $attributes);
    // Enforce reload of entity from Apigee Edge.
    $this->entityCache()->removeEntities([$entity_id]);
    $this->entityCache()->allEntitiesInCache(FALSE);
    return $attributes;
  }

  /**
   * {@inheritdoc}
   */
  public function updateAttribute(string $entity_id, string $name, string $value): string {
    $value = $this->decorated()->updateAttribute($entity_id, $name, $value);
    // Enforce reload of entity from Apigee Edge.
    $this->entityCache()->removeEntities([$entity_id]);
    $this->entityCache()->allEntitiesInCache(FALSE);
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function deleteAttribute(string $entity_id, string $name): void {
    $this->decorated()->deleteAttribute($entity_id, $name);
    // Enforce reload of entity from Apigee Edge.
    $this->entityCache()->removeEntities([$entity_id]);
    $this->entityCache()->allEntitiesInCache(FALSE);
  }

}
