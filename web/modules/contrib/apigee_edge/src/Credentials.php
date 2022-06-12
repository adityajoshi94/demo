<?php

namespace Drupal\apigee_edge;

use Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface;
use Drupal\key\KeyInterface;
use Http\Message\Authentication;

/**
 * The API credentials.
 *
 * @todo move to \Drupal\apigee_edge\Connector namespace.
 */
class Credentials implements CredentialsInterface {

  /**
   * The key entity which stores the API credentials.
   *
   * @var \Drupal\key\KeyInterface
   */
  protected $key;

  /**
   * The key type of the key entity.
   *
   * @var \Drupal\apigee_edge\Plugin\EdgeKeyTypeInterface
   */
  protected $keyType;

  /**
   * Credentials constructor.
   *
   * @param \Drupal\key\KeyInterface $key
   *   The key entity which stores the API credentials.
   *
   * @throws \InvalidArgumentException
   *   An InvalidArgumentException is thrown if the key type
   *   does not implement EdgeKeyTypeInterface.
   */
  public function __construct(KeyInterface $key) {
    if (!(($key_type = $key->getKeyType()) instanceof EdgeKeyTypeInterface)) {
      throw new \InvalidArgumentException("Type of {$key->id()} key does not implement EdgeKeyTypeInterface.");
    }

    $this->key = $key;
    $this->keyType = $key_type;
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthentication(): Authentication {
    return $this->keyType->getAuthenticationMethod($this->key);
  }

  /**
   * {@inheritdoc}
   */
  public function getKey(): KeyInterface {
    return $this->key;
  }

  /**
   * {@inheritdoc}
   */
  public function getKeyType(): EdgeKeyTypeInterface {
    return $this->keyType;
  }

}
