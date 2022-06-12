<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;

/**
 * Provides an interface for Apigee Edge entity event deriver.
 */
interface EdgeEntityEventDeriverInterface extends ContainerDeriverInterface {

  /**
   * Returns the event's label. Example: 'After saving a new App'.
   *
   * @param \Drupal\apigee_edge\Entity\EdgeEntityTypeInterface $entity_type
   *   The Apigee Edge entity type.
   *
   * @return string
   *   The event's label.
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string;

  /**
   * Returns an array of event context.
   *
   * @param \Drupal\apigee_edge\Entity\EdgeEntityTypeInterface $entity_type
   *   The Apigee Edge entity type.
   *
   * @return array
   *   An array of event context.
   */
  public function getContext(EdgeEntityTypeInterface $entity_type): array;

  /**
   * Returns an array of entity types that are compatible to this event.
   *
   * @return array
   *   An array of Edge entity types.
   */
  public function getEntityTypes(): array;

}
