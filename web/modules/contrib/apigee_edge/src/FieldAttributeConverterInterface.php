<?php

namespace Drupal\apigee_edge;

use Apigee\Edge\Structure\AttributesProperty;

/**
 * Field-attribute converter service definition.
 */
interface FieldAttributeConverterInterface {

  /**
   * Returns the name of the mapped attribute to a field.
   *
   * @param string $field_name
   *   Name of a field.
   *
   * @return string
   *   Name of the mapped attribute.
   */
  public function getAttributeName(string $field_name): string;

  /**
   * Returns the name of the mapped field to an attribute.
   *
   * @param string $attribute_name
   *   Name of an attribute.
   *
   * @return string
   *   Name of the mapped field.
   */
  public function getFieldName(string $attribute_name): string;

  /**
   * Gets field value from the related attribute.
   *
   * @param string $entity_type
   *   The entity type.
   * @param string $field_name
   *   Name of a field in Drupal.
   * @param \Apigee\Edge\Structure\AttributesProperty $attributes
   *   Attribute property that contains the attributes on an entity.
   *
   * @return mixed|null
   *   Field value from related attribute. It returns NULL if field does
   *   not have an attribute on the entity or its value is actually NULL.
   */
  public function getFieldValueFromAttribute(string $entity_type, string $field_name, AttributesProperty $attributes);

  /**
   * Generate attribute value from field's value.
   *
   * @param string $entity_type
   *   The entity type.
   * @param string $field_name
   *   Name of the field in Drupal.
   * @param mixed $field_value
   *   Field's value in Drupal.
   *
   * @return null|string
   *   The field value as string for the attribute or NULL if no field formatter
   *   found.
   */
  public function getAttributeValueFromField(string $entity_type, string $field_name, $field_value);

}
