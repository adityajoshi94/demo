<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

/**
 * Stores entity ids that getEntityIds() methods returns in controllers.
 *
 * The primary entity id used in the SDK and in Drupal may not be the same as
 * what wrapped API endpoint in a getEntityIds() method returns.
 * Ex.: In case of developers, the primary id used in the SDK in the developerId
 * (UUID) but the getEntityIds() method returns email addresses.
 *
 * @see \Apigee\Edge\Controller\PaginatedEntityIdListingControllerInterface
 * @see \Apigee\Edge\Controller\NonPaginatedEntityIdListingControllerInterface
 */
interface EntityIdCacheInterface {

  /**
   * Returns cached ids.
   *
   * @return string[]
   *   Array of entity ids.
   */
  public function getIds(): array;

  /**
   * Adds entity ids to the cache.
   *
   * @param string[] $ids
   *   Array of entity ids to add.
   */
  public function saveIds(array $ids): void;

  /**
   * Adds entities to the cache.
   *
   * @param \Apigee\Edge\Entity\EntityInterface[] $entities
   *   Array of entities.
   */
  public function saveEntities(array $entities): void;

  /**
   * Removes ids from the cache.
   *
   * @param string[] $ids
   *   Array of ids to be removed.
   */
  public function removeIds(array $ids): void;

  /**
   * Returns whether all entity ids in cache or not.
   *
   * @return bool
   *   Current state.
   */
  public function isAllIdsInCache(): bool;

  /**
   * Changes whether all ids in the cache or not.
   *
   * @param bool $all_ids_in_cache
   *   State to be set.
   */
  public function allIdsInCache(bool $all_ids_in_cache): void;

}
