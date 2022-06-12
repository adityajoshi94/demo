<?php

namespace Drupal\apigee_edge_teams\Entity\Controller;

/**
 * Base definition of the team app credential factory service.
 */
interface TeamAppCredentialControllerFactoryInterface {

  /**
   * Returns a preconfigured controller for the owner's app.
   *
   * @param string $owner
   *   The name of a team (company).
   * @param string $app_name
   *   Name of an app. (Not an app id, because app credentials endpoints does
   *   not allow to use them.)
   *
   * @return \Drupal\apigee_edge_teams\Entity\Controller\TeamAppCredentialControllerInterface
   *   The team app credentials controller.
   */
  public function teamAppCredentialController(string $owner, string $app_name): TeamAppCredentialControllerInterface;

}
