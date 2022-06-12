<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Entity\EntityInterface;
use Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface;

/**
 * Management API specific cached entity controller implementation.
 *
 * For those Management API controllers in Drupal that uses an entity cache
 * to reduce the number of API calls sent by Drupal to Apigee Edge.
 */
final class CachedManagementApiEdgeEntityControllerProxy implements EdgeEntityControllerInterface, EntityCacheAwareControllerInterface {

  /**
   * The original cached entity controller.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\EntityCacheAwareControllerInterface
   */
  private $originalController;

  /**
   * The MGMT API proxy controller created from the original controller.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\ManagementApiEdgeEntityControllerProxy
   */
  private $proxiedController;

  /**
   * CachedManagementApiEdgeEntityControllerProxy constructor.
   *
   * @param \Drupal\apigee_edge\Entity\Controller\EntityCacheAwareControllerInterface $controller
   *   The entity controller that uses cache.
   */
  public function __construct(EntityCacheAwareControllerInterface $controller) {
    $this->originalController = $controller;
    $this->proxiedController = new ManagementApiEdgeEntityControllerProxy($controller);
  }

  /**
   * {@inheritdoc}
   */
  public function create(EntityInterface $entity): void {
    $this->proxiedController->create($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function load(string $id): EntityInterface {
    return $this->proxiedController->load($id);
  }

  /**
   * {@inheritdoc}
   */
  public function update(EntityInterface $entity): void {
    $this->proxiedController->update($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function delete(string $id): void {
    $this->proxiedController->delete($id);
  }

  /**
   * {@inheritdoc}
   */
  public function loadAll(): array {
    return $this->proxiedController->loadAll();
  }

  /**
   * {@inheritdoc}
   */
  public function entityCache(): EntityCacheInterface {
    return $this->originalController->entityCache();
  }

}
