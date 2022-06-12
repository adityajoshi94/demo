<?php

namespace Drupal\apigee_edge\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Triggered when an Apigee Edge entity's field config UI gets built.
 *
 * @see \Drupal\apigee_edge\Controller\EdgeEntityFieldConfigListController
 * @see \Drupal\apigee_edge\Routing\EdgeEntityFieldConfigListRouteSubscriber
 */
class EdgeEntityFieldConfigListAlterEvent extends Event {

  /**
   * Event id.
   *
   * @var string
   */
  public const EVENT_NAME = 'apigee_edge.field_config_list_alter';

  /**
   * The entity type id.
   *
   * @var string
   */
  private $entityType;

  /**
   * Page render array.
   *
   * @var array
   */
  private $page;

  /**
   * AppFieldConfigListAlterEvent constructor.
   *
   * @param string $entity_type
   *   The entity type id.
   * @param array $page
   *   The page render array.
   */
  public function __construct(string $entity_type, array &$page) {
    $this->entityType = $entity_type;
    $this->page = $page;
  }

  /**
   * Returns the entity type.
   *
   * @return string
   *   The entity type.
   */
  public function getEntityType(): string {
    return $this->entityType;
  }

  /**
   * Returns the page render array by reference.
   *
   * @return array
   *   The page render array.
   */
  public function &getPage(): array {
    return $this->page;
  }

}
