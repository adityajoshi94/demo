<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Structure\PagerInterface;

/**
 * For those controllers that supports paginated entity listing.
 *
 * @see \Apigee\Edge\Controller\PaginatedEntityListingControllerInterface
 */
trait CachedPaginatedEntityListingControllerTrait {

  use EntityCacheAwareControllerTrait;

  /**
   * The decorated entity controller from the SDK.
   *
   * We did not added a return type because this way all entity controller's
   * decorated() method becomes compatible with this declaration.
   *
   * @return \Apigee\Edge\Controller\PaginatedEntityListingControllerInterface
   *   An entity controller that extends these interfaces.
   */
  abstract protected function decorated();

  /**
   * {@inheritdoc}
   */
  public function getEntities(PagerInterface $pager = NULL, string $key_provider = 'id'): array {
    if ($this->entityCache()->isAllEntitiesInCache()) {
      if ($pager === NULL) {
        return $this->entityCache()->getEntities();
      }
      else {
        return $this->extractSubsetOfAssociativeArray($this->entityCache()->getEntities(), $pager->getLimit(), $pager->getStartKey());
      }
    }

    $entities = $this->decorated()->getEntities($pager, $key_provider);
    $this->entityCache()->saveEntities($entities);
    if ($pager === NULL) {
      $this->entityCache()->allEntitiesInCache(TRUE);
    }

    return $entities;
  }

  /**
   * {@inheritdoc}
   */
  abstract protected function extractSubsetOfAssociativeArray(array $assoc_array, int $limit, ?string $start_key = NULL): array;

}
