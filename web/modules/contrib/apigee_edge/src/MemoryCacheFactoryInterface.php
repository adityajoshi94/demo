<?php

namespace Drupal\apigee_edge;

use Drupal\Core\Cache\MemoryCache\MemoryCacheInterface;

/**
 * Base definition of the memory cache factory service.
 */
interface MemoryCacheFactoryInterface {

  /**
   * Gets a memory cache backend class for a given cache bin.
   *
   * @param string $bin
   *   The cache bin for which a cache backend object should be returned.
   *
   * @return \Drupal\Core\Cache\MemoryCache\MemoryCacheInterface
   *   The memory cache backend object associated with the specified bin.
   */
  public function get($bin): MemoryCacheInterface;

}
