<?php

namespace Drupal\apigee_edge_debug\Plugin\DebugMessageFormatter;

use GuzzleHttp\TransferStats;
use Http\Message\Formatter;
use Http\Message\Formatter\CurlCommandFormatter as OriginalCurlCommandFormatter;

/**
 * CURL command message formatter plugin.
 *
 * Output API request as a cURL command. It does not render response- or
 * transfer statistics data.
 *
 * @DebugMessageFormatter(
 *   id = "curl",
 *   label = @Translation("cURL command"),
 * )
 */
class CurlCommandFormatter extends DebugMessageFormatterPluginBase {

  /**
   * The original cURL command formatter.
   *
   * @var \Http\Message\Formatter\CurlCommandFormatter
   */
  private static $formatter;

  /**
   * {@inheritdoc}
   */
  public function formatStats(TransferStats $stats): string {
    return '';
  }

  /**
   * {@inheritdoc}
   */
  protected function getFormatter(): Formatter {
    if (NULL === self::$formatter) {
      self::$formatter = new OriginalCurlCommandFormatter();
    }
    return self::$formatter;
  }

}
