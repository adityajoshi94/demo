<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Base definition of the app name cache service by app owner.
 */
final class AppNameCacheByOwnerFactory implements AppNameCacheByOwnerFactoryInterface {

  /**
   * Internal cache for created instances.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\EntityIdCacheInterface[]
   */
  private $instances = [];

  /**
   * {@inheritdoc}
   */
  public function getAppNameCache(string $owner): EntityIdCacheInterface {
    if (!isset($this->instances[$owner])) {
      $this->instances[$owner] = new EntityIdCache();
    }

    return $this->instances[$owner];
  }

}
