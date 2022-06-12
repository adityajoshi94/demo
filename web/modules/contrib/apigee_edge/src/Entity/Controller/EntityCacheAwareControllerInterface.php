<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface;

/**
 * Base interface for those controllers that uses an entity cache.
 */
interface EntityCacheAwareControllerInterface {

  /**
   * Returns the entity cache used by the controller.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface
   *   The entity cache.
   */
  public function entityCache(): EntityCacheInterface;

}
