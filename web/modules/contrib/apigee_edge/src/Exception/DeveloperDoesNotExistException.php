<?php

namespace Drupal\apigee_edge\Exception;

use Apigee\Edge\Exception\ApiException;

/**
 * This exception is thrown when the developer for a user cannot be loaded.
 */
class DeveloperDoesNotExistException extends ApiException implements ApigeeEdgeExceptionInterface {

  /**
   * Email address of the developer that is supposed to exist.
   *
   * @var string
   */
  protected $email;

  /**
   * DeveloperDoesNotExistException constructor.
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
  public function __construct(string $email, string $message = 'Developer with @email email address not found. Running the developer sync could fix this.', int $code = 0, \Throwable $previous = NULL) {
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
