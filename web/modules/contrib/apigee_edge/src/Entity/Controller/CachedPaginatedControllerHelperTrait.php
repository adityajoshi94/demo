<?php

namespace Drupal\apigee_edge\Entity\Controller;

use Apigee\Edge\Structure\PagerInterface;

/**
 * Shared defs. for cached paginated entity & entity od listing controllers.
 */
trait CachedPaginatedControllerHelperTrait {

  /**
   * The decorated entity controller from the SDK.
   *
   * We did not added a return type because this way all entity controller's
   * decorated() method becomes compatible with this declaration.
   *
   * @return \Apigee\Edge\Controller\PaginatedEntityIdListingControllerInterface|\Apigee\Edge\Controller\PaginatedEntityListingControllerInterface
   *   An entity controller that extends these interfaces.
   */
  abstract protected function decorated();

  /**
   * {@inheritdoc}
   */
  public function createPager(int $limit = 0, ?string $start_key = NULL): PagerInterface {
    return $this->decorated()->createPager($limit, $start_key);
  }

  /**
   * Utility function that returns a subset of an associative array.
   *
   * @param array $assoc_array
   *   Input array.
   * @param int $limit
   *   Limit.
   * @param string|null $start_key
   *   The start key, if it is null than it is first key of the array.
   *
   * @return array
   *   Subset of the array.
   */
  final protected function extractSubsetOfAssociativeArray(array $assoc_array, int $limit, ?string $start_key = NULL): array {
    $array_keys = array_keys($assoc_array);
    if ($start_key === NULL) {
      $start_key = reset($array_keys);
    }
    $pos = array_search($start_key, $array_keys);
    return array_slice($assoc_array, $pos, $limit);
  }

}
