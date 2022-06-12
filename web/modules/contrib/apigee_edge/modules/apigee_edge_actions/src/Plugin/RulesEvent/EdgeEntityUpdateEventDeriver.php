<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;

/**
 * Deriver for Edge entity update events.
 */
class EdgeEntityUpdateEventDeriver extends EdgeEntityEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After updating a @entity_type', ['@entity_type' => $entity_type->getSingularLabel()]);
  }

  /**
   * {@inheritdoc}
   */
  public function getContext(EdgeEntityTypeInterface $entity_type): array {
    $context = parent::getContext($entity_type);

    // Add the original entity to the context.
    $context["{$entity_type->id()}_unchanged"] = [
      'type' => "entity:{$entity_type->id()}",
      'label' => $this->t('Unchanged @entity_type', ['@entity_type' => $entity_type->getLabel()]),
    ];

    return $context;
  }

}
