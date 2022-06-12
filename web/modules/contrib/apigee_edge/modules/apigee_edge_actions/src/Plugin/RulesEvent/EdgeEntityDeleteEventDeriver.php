<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;

/**
 * Deriver for Edge entity delete events.
 */
class EdgeEntityDeleteEventDeriver extends EdgeEntityEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After deleting a @entity_type', ['@entity_type' => $entity_type->getSingularLabel()]);
  }

}
