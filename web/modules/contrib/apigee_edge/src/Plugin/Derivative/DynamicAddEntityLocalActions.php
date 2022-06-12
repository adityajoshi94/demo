<?php

namespace Drupal\apigee_edge\Plugin\Derivative;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;
use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Add add entity local actions for Apigee Edge entity's collection routes.
 */
class DynamicAddEntityLocalActions extends DeriverBase implements ContainerDeriverInterface {

  use StringTranslationTrait;

  /**
   * The base plugin ID.
   *
   * @var string
   */
  protected $basePluginId;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The moderation information service.
   *
   * @var \Drupal\content_moderation\ModerationInformationInterface
   */
  protected $moderationInfo;

  /**
   * Creates an DynamicAddEntityLocalTasks object.
   *
   * @param string $base_plugin_id
   *   The base plugin ID.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
   *   The translation manager.
   */
  public function __construct($base_plugin_id, EntityTypeManagerInterface $entity_type_manager, TranslationInterface $string_translation) {
    $this->entityTypeManager = $entity_type_manager;
    $this->stringTranslation = $string_translation;
    $this->basePluginId = $base_plugin_id;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $base_plugin_id,
      $container->get('entity_type.manager'),
      $container->get('string_translation')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $this->derivatives = [];

    foreach ($this->entityTypeManager->getDefinitions() as $type) {
      if ($type instanceof EdgeEntityTypeInterface) {
        foreach ($this->entityTypeManager->getRouteProviders($type->id()) as $provider) {
          $collection_route_name = "entity.{$type->id()}.collection";
          $collection_route = $provider->getRoutes($type)->get($collection_route_name);
          $add_form_route_name = "entity.{$type->id()}.add_form";
          $add_form_route = $provider->getRoutes($type)->get($add_form_route_name);
          if ($collection_route && $add_form_route) {
            $this->derivatives["{$type->getProvider()}.{$type->id()}.add_form"] = [
              'route_name' => $add_form_route_name,
              'title' => $this->t('Add @entity-type', ['@entity-type' => mb_strtolower($type->getSingularLabel())]),
              'appears_on' => [$collection_route_name],
            ] + $base_plugin_definition;

            break;
          }
        }
      }
    }

    return $this->derivatives;
  }

}
