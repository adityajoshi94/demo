<?php

namespace Drupal\apigee_edge;

use Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface;
use Drupal\key\KeyInterface;
use Http\Message\Authentication;

/**
 * Defines an interface for credentials classes.
 *
 * @todo move to \Drupal\apigee_edge\Connector namespace.
 */
interface CredentialsInterface {

  /**
   * Gets the authentication object which instantiated by the key type.
   *
   * @return \Http\Message\Authentication
   *   The authentication object.
   */
  public function getAuthentication(): Authentication;

  /**
   * Gets the key entity which stores the API credentials.
   *
   * @return \Drupal\key\KeyInterface
   *   The key entity which stores the API credentials.
   */
  public function getKey(): KeyInterface;

  /**
   * Gets the key type of the key entity.
   *
   * @return \Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface
   *   The key type of the key entity.
   */
  public function getKeyType(): EdgeKeyTypeInterface;

}
