<?php

namespace Drupal\apigee_edge\Entity\Controller\Cache;

use Apigee\Edge\Entity\EntityInterface;

/**
 * Base definition of the entity cache used by controllers.
 *
 * Stores entities returned by entity controllers.
 */
interface EntityCacheInterface {

  /**
   * Saves entities to the cache.
   *
   * @param \Apigee\Edge\Entity\EntityInterface[] $entities
   *   Array of entities.
   */
  public function saveEntities(array $entities): void;

  /**
   * Removes entities from the cache by their ids.
   *
   * @param string[] $ids
   *   Array of entity ids.
   */
  public function removeEntities(array $ids): void;

  /**
   * Returns entities from the cache.
   *
   * @param array $ids
   *   Array of entity ids.
   *   If an empty array is passed all currently stored gets returned.
   *
   * @return \Apigee\Edge\Entity\EntityInterface[]
   *   Array of entities.
   */
  public function getEntities(array $ids = []): array;

  /**
   * Returns an entity from the cache by its id.
   *
   * @param string $id
   *   Entity id.
   *
   * @return \Apigee\Edge\Entity\EntityInterface|null
   *   The entity if it is in the cache, null otherwise.
   */
  public function getEntity(string $id): ?EntityInterface;

  /**
   * Changes whether all entities in the cache or not.
   *
   * @param bool $all_entities_in_cache
   *   State to be set.
   */
  public function allEntitiesInCache(bool $all_entities_in_cache): void;

  /**
   * Returns whether all entities in cache or not.
   *
   * @return bool
   *   Current state.
   */
  public function isAllEntitiesInCache(): bool;

}
