<?php

namespace Drupal\apigee_edge\Entity\Controller;

/**
 * Base definition of the developer app controller factory service.
 */
interface DeveloperAppControllerFactoryInterface {

  /**
   * Returns a preconfigured developer app controller.
   *
   * @param string $developer
   *   Email address or id (UUID) of a developer.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\DeveloperAppControllerInterface
   *   Developer app controller.
   */
  public function developerAppController(string $developer): DeveloperAppControllerInterface;

}
