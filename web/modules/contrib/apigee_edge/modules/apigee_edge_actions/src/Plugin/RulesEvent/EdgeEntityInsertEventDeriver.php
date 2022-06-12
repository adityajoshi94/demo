<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;

/**
 * Deriver for Edge entity insert events.
 */
class EdgeEntityInsertEventDeriver extends EdgeEntityEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After saving a new @entity_type', ['@entity_type' => $entity_type->getSingularLabel()]);
  }

}
