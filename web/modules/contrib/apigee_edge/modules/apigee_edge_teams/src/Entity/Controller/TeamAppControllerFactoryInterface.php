<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

/**
 * Interface TeamAppControllerFactoryInterface.
 */
interface TeamAppControllerFactoryInterface {

  /**
   * Returns a preconfigured team app controller.
   *
   * @param string $team
   *   Name of a team.
   *
   * @return \Drupal\apigee_edge_teams\Entity\Controller\TeamAppControllerInterface
   *   Team app controller.
   */
  public function teamAppController(string $team): TeamAppControllerInterface;

}
