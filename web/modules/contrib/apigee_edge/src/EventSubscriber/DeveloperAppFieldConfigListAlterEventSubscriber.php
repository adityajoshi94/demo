<?php

namespace Drupal\apigee_edge\EventSubscriber;

use Drupal\apigee_edge\Event\EdgeEntityFieldConfigListAlterEvent;
use Drupal\apigee_edge\Form\DeveloperAppBaseFieldConfigForm;
use Drupal\Core\Form\FormBuilderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Adds base field configuration form to developer app entity's field config UI.
 */
final class DeveloperAppFieldConfigListAlterEventSubscriber implements EventSubscriberInterface {

  /**
   * The form builder service.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  private $formBuilder;

  /**
   * DeveloperAppFieldConfigListAlterEventSubscriber constructor.
   *
   * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
   *   The form builder service.
   */
  public function __construct(FormBuilderInterface $form_builder) {
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      EdgeEntityFieldConfigListAlterEvent::EVENT_NAME => 'alterPage',
    ];
  }

  /**
   * Alters the field config UI page.
   *
   * @param \Drupal\apigee_edge\Event\EdgeEntityFieldConfigListAlterEvent $event
   *   The field config list alter event.
   */
  public function alterPage(EdgeEntityFieldConfigListAlterEvent $event) {
    if ($event->getEntityType() === 'developer_app') {
      $page = &$event->getPage();
      $page['base_field_config'] = $this->formBuilder->getForm(DeveloperAppBaseFieldConfigForm::class);
    }
  }

}
