<?php

namespace Drupal\apigee_edge_actions;

use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the ApigeeActionsEntityTypeHelperInterface interface.
 */
interface ApigeeActionsEntityTypeHelperInterface {

  /**
   * Returns an array of Apigee Edge entity types.
   *
   * @return \Drupal\Core\Entity\EntityTypeInterface[]
   *   An array of Apigee Edge entity types.
   */
  public function getEntityTypes(): array;

  /**
   * Determines if the given entity type is a fieldable Edge entity type.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return bool
   *   TRUE if given entity type is a fieldable Edge entity type. FALSE otherwise.
   */
  public function isFieldableEdgeEntityType(EntityTypeInterface $entity_type): bool;

}
