<?php

namespace Drupal\apigee_edge\Entity\Controller;

/**
 * Base definition of the developer app credential factory service.
 */
interface DeveloperAppCredentialControllerFactoryInterface {

  /**
   * Returns a preconfigured controller for the owner's app.
   *
   * @param string $owner
   *   Email address or id (UUID) of a developer.
   * @param string $app_name
   *   Name of an app. (Not an app id, because app credentials endpoints does
   *   not allow to use them.)
   *
   * @return \Drupal\apigee_edge\Entity\Controller\DeveloperAppCredentialControllerInterface
   *   The developer app credentials controller.
   */
  public function developerAppCredentialController(string $owner, string $app_name): DeveloperAppCredentialControllerInterface;

}
