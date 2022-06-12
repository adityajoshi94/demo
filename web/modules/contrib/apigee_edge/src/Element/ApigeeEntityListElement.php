<?php

namespace Drupal\apigee_edge\Element;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\Element\RenderElement;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an element for listing Apigee entities.
 *
 * @RenderElement("apigee_entity_list")
 */
class ApigeeEntityListElement extends RenderElement implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * ApigeeEntityListElement constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param array $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      '#entities' => NULL,
      '#entity_type' => NULL,
      '#view_mode' => NULL,
      '#theme' => 'apigee_entity_list',
      '#pre_render' => [
        [$this, 'preRender'],
      ],
    ];
  }

  /**
   * Pre-render callback.
   */
  public function preRender($element) {
    $element['items'] = $this->entityTypeManager->getViewBuilder($element['#entity_type']->id())
      ->viewMultiple($element['#entities'], $element['#view_mode']);

    return $element;
  }

}
