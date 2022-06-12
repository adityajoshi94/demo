<?php

namespace Drupal\apigee_edge_actions;

use Drupal\apigee_edge\Entity\FieldableEdgeEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Defines the apigee_edge_actions.edge_entity_type_manager service.
 */
class ApigeeActionsEntityTypeHelper implements ApigeeActionsEntityTypeHelperInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * ApigeeAppEntityTypeManager constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityTypes(): array {
    return array_filter($this->entityTypeManager->getDefinitions(), function (EntityTypeInterface $entity_type) {
      return $this->isFieldableEdgeEntityType($entity_type);
    });
  }

  /**
   * {@inheritdoc}
   */
  public function isFieldableEdgeEntityType(EntityTypeInterface $entity_type): bool {
    return $entity_type->entityClassImplements(FieldableEdgeEntityInterface::class);
  }

}
