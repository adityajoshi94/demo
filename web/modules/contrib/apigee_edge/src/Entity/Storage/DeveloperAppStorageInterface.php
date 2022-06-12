<?php

namespace Drupal\apigee_edge\Entity\Storage;

/**
 * Defines an interface for developer app entity storage classes.
 */
interface DeveloperAppStorageInterface extends AttributesAwareFieldableEdgeEntityStorageInterface {

  /**
   * Loads developer apps by developer.
   *
   * @param string $developer_id
   *   Developer id (UUID) or email address of a developer.
   *
   * @return \Drupal\apigee_edge\Entity\DeveloperApp[]
   *   The array of the developer apps of the given developer.
   */
  public function loadByDeveloper(string $developer_id): array;

}
