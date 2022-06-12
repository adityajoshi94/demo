<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Base definition of the general app cache service for an app owner.
 *
 * This generates an app cache for apps of a company or a developer.
 */
final class AppCacheByOwnerFactory implements AppCacheByOwnerFactoryInterface {

  /**
   * Internal cache for created instances.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheByOwnerInterface[]
   */
  private $instances = [];

  /**
   * The app name cache by owner factory service.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\AppNameCacheByOwnerFactoryInterface
   */
  private $appNameCacheByOwnerFactory;

  /**
   * The app cache service that stores app by their app id (UUID).
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheInterface
   */
  private $appCache;

  /**
   * AppCacheByAppOwnerFactory constructor.
   *
   * @param \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheInterface $app_cache
   *   The app cache service that stores app by their app id (UUID).
   * @param \Drupal\apigee_edge\Entity\Controller\Cache\AppNameCacheByOwnerFactoryInterface $app_name_cache_by_owner_factory
   *   The app name cache by owner factory service.
   */
  public function __construct(AppCacheInterface $app_cache, AppNameCacheByOwnerFactoryInterface $app_name_cache_by_owner_factory) {
    $this->appCache = $app_cache;
    $this->appNameCacheByOwnerFactory = $app_name_cache_by_owner_factory;
  }

  /**
   * {@inheritdoc}
   */
  public function getAppCache(string $owner): AppCacheByOwnerInterface {
    if (!isset($this->instances[$owner])) {
      $this->instances[$owner] = new AppCacheByOwner($owner, $this->appCache, $this->appNameCacheByOwnerFactory);
    }

    return $this->instances[$owner];
  }

}
