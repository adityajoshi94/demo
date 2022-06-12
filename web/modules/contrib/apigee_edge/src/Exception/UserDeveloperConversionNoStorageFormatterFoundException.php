<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\Core\Field\FieldDefinitionInterface;

/**
 * Thrown when no storage formatter found for a user field.
 */
class UserDeveloperConversionNoStorageFormatterFoundException extends UserDeveloperConversionException {

  /**
   * Type of field with no formatter available.
   *
   * @var \Drupal\Core\Field\FieldDefinitionInterface
   */
  protected $fieldDefinition;

  /**
   * UserDeveloperConversionNoStorageFormatterFoundException constructor.
   *
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   Field definition.
   * @param string $message
   *   Exception message.
   * @param int|null $code
   *   Error code.
   * @param \Throwable|null $previous
   *   Previous exception.
   */
  public function __construct(FieldDefinitionInterface $field_definition, string $message = 'No available storage formatter found for "@field_type" field type.', ?int $code = NULL, ?\Throwable $previous = NULL) {
    $message = strtr($message, ['@field_type' => $field_definition->getType()]);
    $this->fieldDefinition = $field_definition;
    parent::__construct($message, $code, $previous);
  }

  /**
   * Returns the definition of the problematic field.
   *
   * @return \Drupal\Core\Field\FieldDefinitionInterface
   *   Defition of the field.
   */
  public function getFieldDefinition(): FieldDefinitionInterface {
    return $this->fieldDefinition;
  }

}
