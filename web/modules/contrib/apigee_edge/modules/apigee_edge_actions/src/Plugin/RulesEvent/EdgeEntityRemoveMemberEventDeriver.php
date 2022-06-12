<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesEvent;

use Drupal\apigee_edge\Entity\EdgeEntityTypeInterface;
use Drupal\apigee_edge_teams\Entity\TeamInterface;

/**
 * Deriver for Edge entity remove_member events.
 */
class EdgeEntityRemoveMemberEventDeriver extends EdgeEntityEventDeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel(EdgeEntityTypeInterface $entity_type): string {
    return $this->t('After removing a team member');
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityTypes(): array {
    // Filter out non team entity types.
    return array_filter(parent::getEntityTypes(), function (EdgeEntityTypeInterface $entity_type) {
      return $entity_type->entityClassImplements(TeamInterface::class);
    });
  }

  /**
   * {@inheritdoc}
   */
  public function getContext(EdgeEntityTypeInterface $entity_type): array {
    $context = parent::getContext($entity_type);

    // Add the team member to the context.
    $context['member'] = [
      'type' => 'entity:user',
      'label' => $this->t('Member'),
    ];

    return $context;
  }

}
