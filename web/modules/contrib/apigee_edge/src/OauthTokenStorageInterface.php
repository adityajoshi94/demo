<?php

namespace Drupal\apigee_edge;

use Apigee\Edge\HttpClient\Plugin\Authentication\OauthTokenStorageInterface as EdgeOauthTokenStorageInterface;

/**
 * Base definition of the OAuth token storage service implementations.
 *
 * @todo move to \Drupal\apigee_edge\Connector namespace.
 */
interface OauthTokenStorageInterface extends EdgeOauthTokenStorageInterface {

  /**
   * Checks requirements of the token storage.
   *
   * If a requirement does not fulfilled it throws an exception.
   *
   * @throws \Drupal\apigee_edge\Exception\OauthTokenStorageException
   *   Exception with the unfulfilled requirement.
   */
  public function checkRequirements(): void;

}
