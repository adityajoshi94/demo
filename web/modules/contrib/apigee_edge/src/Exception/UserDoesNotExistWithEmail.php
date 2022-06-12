<?php

namespace Drupal\apigee_edge\Exception;

/**
 * Thrown when user does not exist with an email.
 */
class UserDoesNotExistWithEmail extends \RuntimeException implements ApigeeEdgeExceptionInterface {

  /**
   * Email address of the developer that is supposed to exist.
   *
   * @var string
   */
  protected $email;

  /**
   * UserDoesNotExistWithEmail constructor.
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
  public function __construct(string $email, string $message = 'User with @email email address not found.', int $code = 0, \Throwable $previous = NULL) {
    $this->email = $email;
    $message = strtr($message, ['@email' => $email]);
    parent::__construct($message, $code, $previous);
  }

  /**
   * Email address of the user.
   *
   * @return string
   *   Email address.
   */
  public function getEmail(): string {
    return $this->email;
  }

}
