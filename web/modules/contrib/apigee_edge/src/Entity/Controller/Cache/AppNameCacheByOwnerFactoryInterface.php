<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Base definition of the app name cache by app owner service.
 *
 * This service should be used to get a dedicated app name cache instance
 * for an app owner.
 */
interface AppNameCacheByOwnerFactoryInterface {

  /**
   * Returns the same app name cache instance for an owner.
   *
   * @param string $owner
   *   Developer id (UUID), email address or a company's company name.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\EntityIdCacheInterface
   *   The app name cache instance that belongs to the owner.
   */
  public function getAppNameCache(string $owner): EntityIdCacheInterface;

}
