<?php

namespace Drupal\apigee_edge\Connector;

use Apigee\Edge\ClientInterface;
use Apigee\Edge\HttpClient\Plugin\Authentication\GceServiceAccount;

/**
 * Decorator for Hybrid authentication plugin.
 */
class GceServiceAccountAuthentication extends GceServiceAccount {

  /**
   * {@inheritdoc}
   */
  protected function authClient(): ClientInterface {
    /** @var \Drupal\apigee_edge\SDKConnectorInterface $sdk_connector */
    $sdk_connector = \Drupal::service('apigee_edge.sdk_connector');
    return $sdk_connector->buildClient($this->getAuthHeader(), $this->getAuthServer());
  }

}
