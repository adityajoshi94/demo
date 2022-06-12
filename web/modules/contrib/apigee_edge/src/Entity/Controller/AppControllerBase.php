<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Drupal\apigee_edge\Entity\Controller\Cache\AppCacheInterface;
use Drupal\apigee_edge\Entity\Controller\Cache\EntityCacheInterface;
use Drupal\apigee_edge\SDKConnectorInterface;

/**
 * Base class for all app controller services in Drupal.
 *
 * Ex. app, developer app, company app.
 */
abstract class AppControllerBase implements EntityCacheAwareControllerInterface {

  /**
   * The organization controller service.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\OrganizationControllerInterface
   */
  protected $organizationController;

  /**
   * The SDK connector service.
   *
   * @var \Drupal\apigee_edge\SDKConnectorInterface
   */
  protected $connector;

  /**
   * The app cache.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheInterface
   */
  protected $appCache;

  /**
   * AppControllerBase constructor.
   *
   * @param \Drupal\apigee_edge\SDKConnectorInterface $connector
   *   The SDK connector service.
   * @param \Drupal\apigee_edge\Entity\Controller\OrganizationControllerInterface $org_controller
   *   The organization controller service.
   * @param \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheInterface $app_cache
   *   The app cache.
   */
  public function __construct(SDKConnectorInterface $connector, OrganizationControllerInterface $org_controller, AppCacheInterface $app_cache) {
    $this->connector = $connector;
    $this->organizationController = $org_controller;
    $this->appCache = $app_cache;
  }

  /**
   * {@inheritdoc}
   */
  public function entityCache(): EntityCacheInterface {
    // Developer apps should always expose the app cache as their entity cache
    // because this stores the actual app objects.
    return $this->appCache;
  }

}
