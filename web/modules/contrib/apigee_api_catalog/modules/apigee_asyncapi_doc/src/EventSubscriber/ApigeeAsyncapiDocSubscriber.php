<?php

namespace Drupal\apigee_asyncapi_doc\EventSubscriber;

use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\views\Views;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Apigee AsyncAPI Doc event subscriber.
 */
class ApigeeAsyncapiDocSubscriber implements EventSubscriberInterface {

  /**
   * The messenger.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * Constructs event subscriber.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  /**
   * Update views on installation.
   *
   * @param \Drupal\Core\Config\ConfigCrudEvent $event
   *   Config crud event.
   */
  public function configSave(ConfigCrudEvent $event) {
    $config = $event->getConfig();
    if ($config->getName() == 'core.entity_view_display.node.asyncapi_doc.default') {

      $view = Views::getView('apigee_api_catalog');
      if (is_object($view)) {
        $display = $view->getDisplay();

        $filters = $view->display_handler->getOption('filters');
        if ($filters['type']) {
          $filters['type']['value']['asyncapi_doc'] = 'asyncapi_doc';
        }
        if (isset($filters['type_1'])) {
          $filters['type_1']['value']['asyncapi_doc'] = 'asyncapi_doc';
        }
        $view->display_handler->overrideOption('filters', $filters);

        $view->save();
        \Drupal::messenger()->addStatus('Updating Views - API Catalog view');
      }

      $view = Views::getView('api_catalog_admin');
      if (is_object($view)) {
        $display = $view->getDisplay();

        $filters = $view->display_handler->getOption('filters');
        if ($filters['type']) {
          $filters['type']['value']['asyncapi_doc'] = 'asyncapi_doc';
        }
        if (isset($filters['type_1'])) {
          $filters['type_1']['value']['asyncapi_doc'] = 'asyncapi_doc';
        }
        $view->display_handler->overrideOption('filters', $filters);

        $view->save();
        \Drupal::messenger()->addStatus('Updating Views - API Catalog Admin');
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      ConfigEvents::SAVE => 'configSave',
    ];
  }

}
