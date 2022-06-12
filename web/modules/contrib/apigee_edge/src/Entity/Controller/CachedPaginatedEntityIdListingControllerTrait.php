<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Structure\PagerInterface;
use Drupal\apigee_edge\Entity\Controller\Cache\EntityIdCacheInterface;

/**
 * For those controllers that supports paginated entity id listing.
 *
 * @see \Apigee\Edge\Controller\PaginatedEntityIdListingControllerInterface
 */
trait CachedPaginatedEntityIdListingControllerTrait {

  /**
   * The decorated entity controller from the SDK.
   *
   * We did not added a return type because this way all entity controller's
   * decorated() method becomes compatible with this declaration.
   *
   * @return \Apigee\Edge\Controller\PaginatedEntityIdListingControllerInterface
   *   An entity controller that extends these interfaces.
   */
  abstract protected function decorated();

  /**
   * Entity id cache used by the entity controller.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\Cache\EntityIdCacheInterface
   *   The entity id cache.
   */
  abstract protected function entityIdCache(): EntityIdCacheInterface;

  /**
   * {@inheritdoc}
   */
  abstract protected function extractSubsetOfAssociativeArray(array $assoc_array, int $limit, ?string $start_key = NULL): array;

  /**
   * {@inheritdoc}
   */
  public function getEntityIds(PagerInterface $pager = NULL): array {
    if ($this->entityIdCache()->isAllIdsInCache()) {
      if ($pager === NULL) {
        return $this->entityIdCache()->getIds();
      }
      else {
        return $this->extractSubsetOfAssociativeArray($this->entityIdCache()->getIds(), $pager->getLimit(), $pager->getStartKey());
      }
    }

    $ids = $this->decorated()->getEntityIds($pager);
    $this->entityIdCache()->saveIds($ids);

    if ($pager === NULL) {
      $this->entityIdCache()->allIdsInCache(TRUE);
    }

    return $ids;
  }

}
