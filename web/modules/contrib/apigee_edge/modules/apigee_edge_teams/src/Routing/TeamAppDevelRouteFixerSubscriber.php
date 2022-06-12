<?php

namespace Drupal\apigee_edge_teams\Routing;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Fixes the entity routes generated by the Devel module.
 *
 * TeamAppByNameRouteAlterSubscriber adds another changes if needed.
 *
 * @see apigee_edge_teams_entity_type_alter()
 * @see \Drupal\apigee_edge_teams\Routing\TeamAppByNameRouteAlterSubscriber
 */
final class TeamAppDevelRouteFixerSubscriber extends RouteSubscriberBase {

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  private $moduleHandler;

  /**
   * TeamAppDevelRouteFixerSubscriber constructor.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   */
  public function __construct(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($this->moduleHandler->moduleExists('devel')) {
      foreach ($collection as $id => $route) {
        if (strpos($id, 'entity.team_app.devel') === 0) {
          $route->setOption('_devel_entity_type_id', 'app');
        }
      }
    }
  }

}
