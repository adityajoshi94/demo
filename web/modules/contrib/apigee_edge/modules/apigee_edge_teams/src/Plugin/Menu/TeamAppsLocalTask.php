<?php

namespace Drupal\apigee_edge_teams\Plugin\Menu;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Menu\LocalTaskDefault;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides a local task that list Team Apps shared by a team.
 */
final class TeamAppsLocalTask extends LocalTaskDefault implements ContainerFactoryPluginInterface {

  /**
   * The Team App entity type definition.
   *
   * @var \Drupal\apigee_edge_teams\Entity\Storage\TeamAppStorageInterface|\Drupal\Core\Entity\EntityTypeInterface
   */
  private $teamAppDefinition;

  /**
   * TeamAppsLocalTask constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param array $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeInterface $team_app_definition
   *   The Team App entity definition.
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, EntityTypeInterface $team_app_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->teamAppDefinition = $team_app_definition;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')->getDefinition('team_app')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle(Request $request = NULL) {
    // Display the current plural label of the Team app entity.
    return $this->teamAppDefinition->getCollectionLabel();
  }

}
