<?php

namespace Drupal\apigee_edge\Entity;

/**
 * Defines an interface for an app warnings checker service.
 */
interface AppWarningsCheckerInterface {

  /**
   * Checks credentials of an app and returns warnings about them.
   *
   * @param \Drupal\apigee_edge\Entity\AppInterface $app
   *   The app entity to be checked.
   *
   * @return array
   *   An associative array that contains information about the revoked
   *   credentials and revoked or pending API products in a credential.
   */
  public function getWarnings(AppInterface $app): array;

}
