<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

use Apigee\Edge\Entity\EntityInterface;

/**
 * Default developer id cache implementation.
 *
 * It stores developer email addresses, developer ids (UUIDs) should not
 * be saved to this cache.
 *
 * DeveloperControllerInterface::getEntityIds() returns email addresses.
 */
class DeveloperIdCache extends EntityIdCache implements EntityIdCacheInterface {

  /**
   * {@inheritdoc}
   */
  protected function getEntityId(EntityInterface $entity): string {
    /** @var \Drupal\apigee_edge\Entity\DeveloperInterface $entity */
    return $entity->getEmail();
  }

}
