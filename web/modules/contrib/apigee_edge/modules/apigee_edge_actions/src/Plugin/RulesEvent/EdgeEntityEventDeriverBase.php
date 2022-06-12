<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;
use Drupal\apigee_edge_actions\ApigeeActionsEntityTypeHelperInterface;
use Drupal\apigee_edge_teams\Entity\TeamAppInterface;
use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Rules event deriver for Apigee Edge entity types.
 */
abstract class EdgeEntityEventDeriverBase extends DeriverBase implements EdgeEntityEventDeriverInterface {

  use StringTranslationTrait;

  /**
   * The apigee app entity type manager service.
   *
   * @var \Drupal\apigee_edge_actions\ApigeeActionsEntityTypeHelperInterface
   */
  protected $edgeEntityTypeManager;

  /**
   * AppEventDeriver constructor.
   *
   * @param \Drupal\apigee_edge_actions\ApigeeActionsEntityTypeHelperInterface $edge_entity_type_manager
   *   The apigee app entity type manager service.
   */
  public function __construct(ApigeeActionsEntityTypeHelperInterface $edge_entity_type_manager) {
    $this->edgeEntityTypeManager = $edge_entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('apigee_edge_actions.edge_entity_type_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityTypes(): array {
    return $this->edgeEntityTypeManager->getEntityTypes();
  }

  /**
   * {@inheritdoc}
   */
  public function getContext(EdgeEntityTypeInterface $entity_type): array {
    $context = [
      $entity_type->id() => [
        'type' => "entity:{$entity_type->id()}",
        'label' => $entity_type->getLabel(),
      ],
    ];

    // Add additional context for App.
    if ($entity_type->entityClassImplements(AppInterface::class)) {
      // Add the developer to the context.
      $context['developer'] = [
        'type' => 'entity:user',
        'label' => 'Developer',
      ];

      // Add the team to the context.
      if ($entity_type->entityClassImplements(TeamAppInterface::class)) {
        $context['team'] = [
          'type' => 'entity:team',
          'label' => 'Team',
        ];
      }
    }

    return $context;
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    foreach ($this->getEntityTypes() as $entity_type) {
      $this->derivatives[$entity_type->id()] = [
        'label' => $this->getLabel($entity_type),
        'category' => $entity_type->getLabel(),
        'entity_type_id' => $entity_type->id(),
        'context_definitions' => $this->getContext($entity_type),
      ] + $base_plugin_definition;
    }

    return $this->derivatives;
  }

}
