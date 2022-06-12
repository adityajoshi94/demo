<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\apigee_edge\Entity\DeveloperInterface;

/**
 * Base exception class for developer to user conversion errors.
 */
class DeveloperToUserConversionException extends UserDeveloperConversionException {

  /**
   * Developer object.
   *
   * @var \Drupal\apigee_edge\Entity\DeveloperInterface
   */
  protected $developer;

  /**
   * DeveloperToUserConversionException constructor.
   *
   * @param \Drupal\apigee_edge\Entity\DeveloperInterface $developer
   *   Developer object.
   * @param string $message
   *   The Exception message.
   * @param int $code
   *   The error code.
   * @param \Throwable|null $previous
   *   The previous throwable used for the exception chaining.
   */
  public function __construct(DeveloperInterface $developer, string $message = 'Unable to convert "@developer" developer to user.', int $code = 0, ?\Throwable $previous = NULL) {
    $this->developer = $developer;
    $message = strtr($message, ['@developer' => $developer->getEmail()]);
    parent::__construct($message, $code, $previous);
  }

  /**
   * Returns the problematic developer.
   *
   * @return \Drupal\apigee_edge\Entity\DeveloperInterface
   *   Developer object.
   */
  public function getDeveloper(): DeveloperInterface {
    return $this->developer;
  }

}
