<?php

namespace Drupal\apigee_edge\Plugin;

use Drupal\key\KeyInterface;

/**
 * Interface for checking the key provider's requirements.
 */
interface KeyProviderRequirementsInterface {

  /**
   * Checks the requirements of the key provider.
   *
   * @param \Drupal\key\KeyInterface $key
   *   The key entity.
   *
   * @throws \Drupal\apigee_edge\Exception\KeyProviderRequirementsException
   *   Exception thrown when the requirements of the key provider are not
   *   fulfilled.
   */
  public function checkRequirements(KeyInterface $key): void;

}
