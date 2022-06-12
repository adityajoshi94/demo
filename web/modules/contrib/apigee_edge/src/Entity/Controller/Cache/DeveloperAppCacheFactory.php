<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

use Drupal\apigee_edge\Exception\DeveloperDoesNotExistException;
use Drupal\Component\Utility\EmailValidatorInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Developer specific app cache by app owner factory service.
 *
 * This service ensures that the same cache instance is being used for
 * the same developer's developer apps even if the developer is sometimes
 * referenced by its UUID and sometimes by its email address.
 */
final class DeveloperAppCacheFactory implements AppCacheByOwnerFactoryInterface {

  /**
   * The (general) app cache by owner factory.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheByOwnerFactoryInterface
   */
  private $appCacheByOwnerFactory;

  /**
   * The email validator service.
   *
   * @var \Drupal\Component\Utility\EmailValidatorInterface
   */
  private $emailValidator;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * DeveloperAppCacheFactory constructor.
   *
   * @param \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheByOwnerFactoryInterface $app_cache_by_owner_factory
   *   The (general) app cache by owner factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Component\Utility\EmailValidatorInterface $email_validator
   *   The email validator service.
   */
  public function __construct(AppCacheByOwnerFactoryInterface $app_cache_by_owner_factory, EntityTypeManagerInterface $entity_type_manager, EmailValidatorInterface $email_validator) {
    $this->appCacheByOwnerFactory = $app_cache_by_owner_factory;
    $this->emailValidator = $email_validator;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Returns the same app cache instance for a developer.
   *
   * Even if the owner is sometime a UUID and sometime an email address.
   *
   * @param string $owner
   *   Developer id (UUID) or email.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\AppCacheByOwnerInterface
   *   The developer app cache that belongs to this owner.
   */
  public function getAppCache(string $owner): AppCacheByOwnerInterface {
    if ($this->emailValidator->isValid($owner)) {
      /** @var \Drupal\apigee_edge\Entity\Developer|null $developer */
      $developer = $this->entityTypeManager->getStorage('developer')->load($owner);
      if ($developer === NULL) {
        throw new DeveloperDoesNotExistException($owner);
      }
      $owner = $developer->getDeveloperId();
    }

    return $this->appCacheByOwnerFactory->getAppCache($owner);
  }

}
