<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\apigee_edge\Entity\DeveloperInterface;

/**
 * Thrown when source attribute does not exist in developer.
 */
class DeveloperToUserConversionAttributeDoesNotExistException extends DeveloperToUserConversionException {

  /**
   * Attribute name.
   *
   * @var string
   */
  protected $attributeName;

  /**
   * DeveloperToUserConversionAttributeDoesNotExistException constructor.
   *
   * @param string $attribute_name
   *   Name of the attribute.
   * @param \Drupal\apigee_edge\Entity\DeveloperInterface $developer
   *   Developer object.
   * @param string $message
   *   The Exception message.
   * @param int $code
   *   The error code.
   * @param \Throwable|null $previous
   *   The previous throwable used for the exception chaining.
   */
  public function __construct(string $attribute_name, DeveloperInterface $developer, string $message = '"@attribute" attribute does not exist in "@developer" developer.', int $code = 0, ?\Throwable $previous = NULL) {
    $this->attributeName = $attribute_name;
    $message = strtr($message, ['@attribute' => $attribute_name]);
    parent::__construct($developer, $message, $code, $previous);
  }

  /**
   * Returns the name of the problematic attribute.
   *
   * @return string
   *   Attribute name.
   */
  public function getAttributeName(): string {
    return $this->attributeName;
  }

}
