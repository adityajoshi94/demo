<?php

namespace Drupal\apigee_edge\Exception;

/**
 * Thrown when source or destination field on user does not exist.
 */
class UserDeveloperConversionUserFieldDoesNotExistException extends UserDeveloperConversionException {

  /**
   * Name of the problematic field.
   *
   * @var string
   */
  protected $fieldName;

  /**
   * UserDeveloperConversionUserFieldDoesNotExistException constructor.
   *
   * @param string $field_name
   *   Name of the problematic field.
   * @param string $message
   *   The Exception message.
   * @param int|null $code
   *   The error code.
   * @param \Throwable|null $previous
   *   The previous throwable used for the exception chaining.
   */
  public function __construct(string $field_name, string $message = 'Field "@field" does not exist on user anymore.', ?int $code = NULL, ?\Throwable $previous = NULL) {
    $message = strtr($message, ['@field' => $field_name]);
    $this->fieldName = $field_name;
    parent::__construct($message, $code, $previous);
  }

  /**
   * Returns the name of the problematic field.
   *
   * @return string
   *   Name of the problematic field.
   */
  public function getFieldName(): string {
    return $this->fieldName;
  }

}
