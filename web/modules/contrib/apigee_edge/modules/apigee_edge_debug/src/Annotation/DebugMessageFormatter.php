<?php

namespace Drupal\apigee_edge_debug\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an Apigee Edge debug message formatter plugin annotation object.
 *
 * @Annotation
 */
class DebugMessageFormatter extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The name of the formatter plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

}
