<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\user\UserInterface;

/**
 * Base exception class for user to developer conversion errors.
 */
class UserToDeveloperConversionException extends UserDeveloperConversionException {

  /**
   * User object.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * UserToDeveloperConversionException constructor.
   *
   * @param \Drupal\user\UserInterface $user
   *   User object.
   * @param string $message
   *   The Exception message, available replacements: @user (email).
   * @param int|null $code
   *   The Exception code, default is the user id.
   * @param \Throwable|null $previous
   *   The previous throwable used for the exception chaining.
   */
  public function __construct(UserInterface $user, string $message = 'Unable to convert "@user" user to developer.', ?int $code = NULL, ?\Throwable $previous = NULL) {
    $this->user = $user;
    $message = strtr($message, ['@user' => $user->getEmail()]);
    $code = $code ?? $user->id();
    parent::__construct($message, $code, $previous);
  }

  /**
   * Returns the problematic user object.
   *
   * @return \Drupal\user\UserInterface
   *   User object.
   */
  public function getUser(): UserInterface {
    return $this->user;
  }

}
