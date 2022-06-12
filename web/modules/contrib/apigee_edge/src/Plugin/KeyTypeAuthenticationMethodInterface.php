<?php

namespace Drupal\apigee_edge\Plugin;

use Drupal\key\KeyInterface;
use Http\Message\Authentication;

/**
 * Interface for creating the required authentication method object.
 */
interface KeyTypeAuthenticationMethodInterface {

  /**
   * Gets the authentication method object.
   *
   * @param \Drupal\key\KeyInterface $key
   *   The key entity.
   *
   * @return \Http\Message\Authentication
   *   The authentication object.
   */
  public function getAuthenticationMethod(KeyInterface $key): Authentication;

}
