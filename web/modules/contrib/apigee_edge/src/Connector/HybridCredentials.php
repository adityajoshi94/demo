<?php

namespace Drupal\apigee_edge\Connector;

use Drupal\apigee_edge\Credentials;
use Drupal\apigee_edge\Exception\InvalidArgumentException;
use Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface;
use Drupal\key\KeyInterface;

/**
 * The API credentials for HybridCredentials.
 */
class HybridCredentials extends Credentials {

  /**
   * HybridCredentials constructor.
   *
   * @param \Drupal\key\KeyInterface $key
   *   The key entity which stores the API credentials.
   *
   * @throws \InvalidArgumentException
   *   An InvalidArgumentException is thrown if the key type
   *   does not implement EdgeKeyTypeInterface.
   */
  public function __construct(KeyInterface $key) {
    if ($key->getKeyType() instanceof EdgeKeyTypeInterface
      && ($auth_type = $key->getKeyType()->getAuthenticationType($key))
      && (
        $auth_type === EdgeKeyTypeInterface::EDGE_AUTH_TYPE_JWT ||
        $auth_type === EdgeKeyTypeInterface::EDGE_AUTH_TYPE_DEFAULT_GCE_SERVICE_ACCOUNT
      )
    ) {
      parent::__construct($key);
    }
    else {
      throw new InvalidArgumentException("The `{$key->id()}` key is not configured for Hybrid Authentication.");
    }
  }

}
