<?php

namespace Drupal\apigee_edge;

use Drupal\Core\Cache\MemoryCache\MemoryCache;
use Drupal\Core\Cache\MemoryCache\MemoryCacheInterface;

/**
 * Definition of the Apigee Edge memory cache factory service.
 */
final class MemoryCacheFactory implements MemoryCacheFactoryInterface {

  /**
   * The default cache bin prefix.
   *
   * @var string
   */
  private const DEFAULT_CACHE_BIN_PREFIX = 'apigee_edge';

  /**
   * Module specific cache bin prefix.
   *
   * @var string
   */
  private $prefix;

  /**
   * Instantiated memory cache bins.
   *
   * @var \Drupal\Core\Cache\MemoryCache\MemoryCacheInterface
   */
  private $bins;

  /**
   * MemoryCacheFactory constructor.
   *
   * @param string|null $prefix
   *   (Optional) Module specific prefix for the bin.
   */
  public function __construct(?string $prefix = NULL) {
    $this->prefix = $prefix ?? static::DEFAULT_CACHE_BIN_PREFIX;
  }

  /**
   * {@inheritdoc}
   */
  public function get($bin): MemoryCacheInterface {
    $bin = "{$this->prefix}_{$bin}";
    if (!isset($this->bins[$bin])) {
      $this->bins[$bin] = new MemoryCache();
    }
    return $this->bins[$bin];
  }

}
