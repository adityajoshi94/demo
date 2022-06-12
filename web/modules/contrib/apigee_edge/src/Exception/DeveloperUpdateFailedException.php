<?php

namespace Drupal\apigee_edge\Exception;

use Apigee\Edge\Exception\ApiException;

/**
 * This exception is thrown when the developer profile update fails.
 */
final class DeveloperUpdateFailedException extends ApiException implements ApigeeEdgeExceptionInterface {

  /**
   * Email address of the developer.
   *
   * @var string
   */
  private $email;

  /**
   * DeveloperUpdateFailedException constructor.
   *
   * @param string $email
   *   Developer email.
   * @param string $message
   *   Exception message.
   * @param int $code
   *   Error code.
   * @param \Throwable|null $previous
   *   Previous exception.
   */
  public function __construct(string $email, string $message = 'Developer @email profile update failed.', int $code = 0, \Throwable $previous = NULL) {
    $this->email = $email;
    $message = strtr($message, ['@email' => $email]);
    parent::__construct($message, $code, $previous);
  }

  /**
   * Email address of the developer.
   *
   * @return string
   *   Email address.
   */
  public function getEmail(): string {
    return $this->email;
  }

}
