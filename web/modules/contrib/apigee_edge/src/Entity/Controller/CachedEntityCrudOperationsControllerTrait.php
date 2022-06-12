<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Entity\EntityInterface;

/**
 * Helper trait for those entity controllers that supports all CRUD operations.
 *
 * This trait ensures that the right entity cache method(s) gets called when
 * a CRUD method is called.
 *
 * @see \Apigee\Edge\Controller\EntityCrudOperationsControllerInterface
 */
trait CachedEntityCrudOperationsControllerTrait {

  use EntityCacheAwareControllerTrait;

  /**
   * The decorated entity controller from the SDK.
   *
   * We did not added a return type because this way all entity controller's
   * decorated() method becomes compatible with this declaration.
   *
   * @return \Apigee\Edge\Controller\EntityCrudOperationsControllerInterface
   *   An entity controller that extends this interface.
   */
  abstract protected function decorated();

  /**
   * {@inheritdoc}
   */
  public function create(EntityInterface $entity): void {
    $this->decorated()->create($entity);
    $this->entityCache()->saveEntities([$entity]);
  }

  /**
   * {@inheritdoc}
   */
  public function delete(string $entity_id): EntityInterface {
    $entity = $this->decorated()->delete($entity_id);
    $this->entityCache()->removeEntities([$entity_id]);
    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function load(string $entity_id): EntityInterface {
    $entity = $this->entityCache()->getEntity($entity_id);
    if ($entity === NULL) {
      $entity = $this->decorated()->load($entity_id);
      $this->entityCache()->saveEntities([$entity]);
    }

    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function update(EntityInterface $entity): void {
    $this->decorated()->update($entity);
    $this->entityCache()->saveEntities([$entity]);
  }

}
