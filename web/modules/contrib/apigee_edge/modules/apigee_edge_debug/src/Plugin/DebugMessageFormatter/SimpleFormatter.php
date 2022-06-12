<?php

namespace Drupal\apigee_edge_debug\Plugin\DebugMessageFormatter;

use Http\Message\Formatter;
use Http\Message\Formatter\SimpleFormatter as OriginalSimpleFormatter;

/**
 * Simple debug message formatter plugin.
 *
 * @DebugMessageFormatter(
 *   id = "simple",
 *   label = @Translation("Simple"),
 * )
 */
class SimpleFormatter extends DebugMessageFormatterPluginBase {

  /**
   * The original simple formatter.
   *
   * @var \Http\Message\Formatter\SimpleFormatter
   */
  private static $formatter;

  /**
   * {@inheritdoc}
   */
  protected function getFormatter(): Formatter {
    if (NULL === self::$formatter) {
      self::$formatter = new OriginalSimpleFormatter();
    }
    return self::$formatter;
  }

}
