<?php

namespace Drupal\apigee_edge\Exception;

/**
 * Thrown when authentication key not found with the id.
 */
class AuthenticationKeyNotFoundException extends AuthenticationKeyException {

  /**
   * Id of the authentication key.
   *
   * @var string
   */
  protected $keyId;

  /**
   * AuthenticationKeyNotFoundException constructor.
   *
   * @param string $key_id
   *   Id of the authentication key.
   * @param string $message
   *   Exception message.
   * @param int $code
   *   Error code.
   * @param \Throwable|null $previous
   *   Previous exception.
   */
  public function __construct(string $key_id, string $message = 'Authentication key not found with "@id" id.', int $code = 0, \Throwable $previous = NULL) {
    $this->keyId = $key_id;
    $message = strtr($message, ['@id' => $key_id]);
    parent::__construct($message, $code, $previous);
  }

  /**
   * Returns the id of the authentication key that does not belongs to a Key.
   *
   * @return string
   *   Id of the authentication key.
   */
  public function getKeyId(): string {
    return $this->keyId;
  }

}
