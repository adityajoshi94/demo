<?php

namespace Drupal\apigee_edge;

use Drupal\apigee_edge\Exception\InvalidArgumentException;
use Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface;
use Drupal\key\KeyInterface;
use Http\Message\Authentication;

/**
 * The API credentials for OAuth.
 *
 * @todo move to \Drupal\apigee_edge\Connector namespace.
 */
class OauthCredentials extends Credentials {

  /**
   * OauthCredentials constructor.
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
      && $auth_type === EdgeKeyTypeInterface::EDGE_AUTH_TYPE_OAUTH
    ) {
      parent::__construct($key);
    }
    else {
      throw new InvalidArgumentException("The `{$key->id()}` key is not configured for OAuth.");
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthentication(): Authentication {
    return $this->keyType->getAuthenticationMethod($this->key);
  }

}
