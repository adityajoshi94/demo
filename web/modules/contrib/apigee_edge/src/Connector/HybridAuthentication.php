<?php

namespace Drupal\apigee_edge\Connector;

use Apigee\Edge\ClientInterface;
use Apigee\Edge\HttpClient\Plugin\Authentication\ApigeeOnGcpOauth2;
use Apigee\Edge\HttpClient\Plugin\Authentication\NullAuthentication;

/**
 * Decorator for Hybrid authentication plugin.
 */
class HybridAuthentication extends ApigeeOnGcpOauth2 {

  /**
   * {@inheritdoc}
   */
  protected function authClient(): ClientInterface {
    /** @var \Drupal\apigee_edge\SDKConnectorInterface $sdk_connector */
    $sdk_connector = \Drupal::service('apigee_edge.sdk_connector');
    return $sdk_connector->buildClient(new NullAuthentication(), $this->getAuthServer());
  }

}
