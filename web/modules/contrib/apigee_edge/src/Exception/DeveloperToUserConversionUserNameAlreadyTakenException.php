<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\apigee_edge\Entity\DeveloperInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Throw when developer's username is already taken in Drupal.
 */
class DeveloperToUserConversionUserNameAlreadyTakenException extends DeveloperToUserConversationInvalidValueException {

  /**
   * DeveloperToUserConversionUserNameAlreadyTakenException constructor.
   *
   * @param \Drupal\apigee_edge\Entity\DeveloperInterface $developer
   *   Developer entity.
   * @param \Symfony\Component\Validator\ConstraintViolationInterface $violation
   *   Constraint violation.
   * @param string $message
   *   Exception message.
   * @param int $code
   *   Error code.
   * @param \Throwable|null $previous
   *   Previous exception.
   */
  public function __construct(DeveloperInterface $developer, ConstraintViolationInterface $violation, string $message = 'The username "@username" is already taken in Drupal.', int $code = 0, ?\Throwable $previous = NULL) {
    $message = strtr($message, ['@username' => $developer->getUserName()]);
    parent::__construct('username', 'name', $violation, $developer, $message, $code, $previous);
  }

}
