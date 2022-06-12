<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;

/**
 * Deriver for Edge entity add_product events.
 */
class EdgeEntityAddProductEventDeriver extends EdgeEntityProductEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After adding an API product');
  }

}
