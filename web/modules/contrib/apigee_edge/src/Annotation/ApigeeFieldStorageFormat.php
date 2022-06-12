<?php

namespace Drupal\apigee_edge\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an Apigee Edge field storage formatter annotation object.
 *
 * @Annotation
 */
class ApigeeFieldStorageFormat extends Plugin {

  /**
   * The ID of the formatter.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the formatter.
   *
   * @var string
   */
  public $label;

  /**
   * List of field types where this plugin is appropriate.
   *
   * If one item is '*' then it will be applied on any field type.
   *
   * @var array
   */
  public $fields;

  /**
   * Weight of this plugin.
   *
   * The plugins will be sorted by weight and will be tried to be applied in
   * that order.
   *
   * @var int
   */
  public $weight;

}
