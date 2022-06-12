<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Definition of the app cache that stores apps by their owner and app name.
 */
interface AppCacheByOwnerFactoryInterface {

  /**
   * Returns the same app cache instance for an owner.
   *
   * @param string $owner
   *   Developer id (UUID), email address or a company's company name.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheByOwnerInterface
   *   The app name cache instance that belongs to the owner.
   */
  public function getAppCache(string $owner): AppCacheByOwnerInterface;

}
