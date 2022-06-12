<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

use Apigee\Edge\Entity\EntityInterface;

/**
 * Default app id cache implementation for app controller.
 *
 * This cache stores app ids (UUIDs), app names must not be saved to this
 * cache.
 *
 * AppControllerInterface::getEntityIds() returns app ids (UUIDs).
 *
 * @see \Apigee\Edge\Api\Management\Controller\AppControllerInterface
 */
final class AppIdCache extends EntityIdCache implements EntityIdCacheInterface {

  /**
   * {@inheritdoc}
   */
  protected function getEntityId(EntityInterface $entity): string {
    /** @var \Apigee\Edge\Api\Management\Entity\AppInterface $entity */
    return $entity->getAppId();
  }

}
