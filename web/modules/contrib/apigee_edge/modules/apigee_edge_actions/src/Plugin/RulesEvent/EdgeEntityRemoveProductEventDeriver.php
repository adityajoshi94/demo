<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;

/**
 * Deriver for Edge entity remove_product events.
 */
class EdgeEntityRemoveProductEventDeriver extends EdgeEntityProductEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After removing an API product');
  }

}
