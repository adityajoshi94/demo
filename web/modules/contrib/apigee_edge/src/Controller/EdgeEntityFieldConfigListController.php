<?php

namespace Drupal\apigee_edge\Controller;

use Drupal\apigee_edge\Event\EdgeEntityFieldConfigListAlterEvent;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\field_ui\Controller\FieldConfigListController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Allows to alter field config UIs of Apigee Edge entities.
 */
class EdgeEntityFieldConfigListController extends FieldConfigListController {

  /**
   * The event dispatcher service.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  private $eventDispatcher;

  /**
   * EdgeEntityFieldConfigListController constructor.
   *
   * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $event_dispatcher
   *   The event dispatcher service.
   */
  public function __construct(EventDispatcherInterface $event_dispatcher) {
    $this->eventDispatcher = $event_dispatcher;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('event_dispatcher')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function listing($entity_type_id = NULL, $bundle = NULL, RouteMatchInterface $route_match = NULL) {
    $page = parent::listing($entity_type_id, $bundle, $route_match);
    $event = new EdgeEntityFieldConfigListAlterEvent($entity_type_id, $page);
    $this->eventDispatcher->dispatch(EdgeEntityFieldConfigListAlterEvent::EVENT_NAME, $event);
    return $event->getPage();
  }

}
