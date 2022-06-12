<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface;

/**
 * Trait for those entity controllers that supports entity caches.
 *
 * This is the trait version of the EntityCacheAwareControllerInterface. This
 * helps to depend on the entityCache() method in traits.
 *
 * @see \Drupal\apigee_edge\Entity\Controller\EntityCacheAwareControllerInterface
 */
trait EntityCacheAwareControllerTrait {

  /**
   * Returns the entity cache used by the controller.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface
   *   The entity cache.
   */
  abstract public function entityCache(): EntityCacheInterface;

}
