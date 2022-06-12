<?php

namespace Drupal\apigee_edge;

use Apigee\Edge\ClientInterface;
use Apigee\Edge\HttpClient\Plugin\Authentication\Oauth;
use Http\Message\Authentication\BasicAuth;

/**
 * Decorator for OAuth authentication plugin.
 *
 * @todo move to \Drupal\apigee_edge\Connector namespace.
 */
class OauthAuthentication extends Oauth {

  /**
   * {@inheritdoc}
   */
  protected function authClient(): ClientInterface {
    /** @var \Drupal\apigee_edge\SDKConnectorInterface $sdk_connector */
    $sdk_connector = \Drupal::service('apigee_edge.sdk_connector');
    return $sdk_connector->buildClient(new BasicAuth($this->clientId, $this->clientSecret), $this->getAuthServer());
  }

}
