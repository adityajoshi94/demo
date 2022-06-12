<?php

namespace Drupal\apigee_edge_actions;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Overrides apigee_edge services.
 */
class ApigeeEdgeActionsServiceProvider implements ServiceProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function register(ContainerBuilder $container) {
    // Decorate the apigee_edge_teams.team_membership_manager service.
    // This cannot be done from "apigee_edge_actions.services.yml" because the
    // "apigee_edge_teams" module might not be enabled.
    if ($container->has('apigee_edge_teams.team_membership_manager')) {
      $container->register('apigee_edge_actions.team_membership_manager', TeamMembershipManager::class)
        ->setDecoratedService('apigee_edge_teams.team_membership_manager')
        ->setArguments([
          new Reference('apigee_edge_actions.team_membership_manager.inner'),
          new Reference('entity_type.manager'),
          new Reference('apigee_edge_teams.company_members_controller_factory'),
          new Reference('apigee_edge.controller.developer'),
          new Reference('apigee_edge.controller.cache.developer_companies'),
          new Reference('cache_tags.invalidator'),
          new Reference('logger.channel.apigee_edge_teams'),
          new Reference('event_dispatcher'),
        ]);
    }
  }

}
