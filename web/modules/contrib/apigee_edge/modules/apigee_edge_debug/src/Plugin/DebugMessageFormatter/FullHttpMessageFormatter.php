<?php

namespace Drupal\apigee_edge_debug\Plugin\DebugMessageFormatter;

use GuzzleHttp\TransferStats;
use Http\Message\Formatter;
use Http\Message\Formatter\FullHttpMessageFormatter as OriginalFullHttpMessageFormatter;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Full HTML debug message formatter plugin.
 *
 * @DebugMessageFormatter(
 *   id = "full_html",
 *   label = @Translation("Full HTML"),
 * )
 */
class FullHttpMessageFormatter extends DebugMessageFormatterPluginBase {

  /**
   * The maximum length of the body.
   *
   * @var int
   */
  private $maxBodyLength = NULL;

  /**
   * The original full HTTP message formatter.
   *
   * @var \Http\Message\Formatter\FullHttpMessageFormatter
   */
  private static $formatter;

  /**
   * {@inheritdoc}
   */
  public function formatStats(TransferStats $stats): string {
    $output = '';
    foreach ($this->getTimeStatsInSeconds($stats) as $key => $value) {
      $output .= "{$key}: $value\r\n";
    }
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  protected function getFormatter(): Formatter {
    if (NULL === self::$formatter) {
      // The default 1000 characters is not enough.
      self::$formatter = new OriginalFullHttpMessageFormatter($this->maxBodyLength);
    }
    return self::$formatter;
  }

  /**
   * {@inheritdoc}
   */
  public function formatResponse(ResponseInterface $response, RequestInterface $request): string {
    return parent::formatResponse($response, $request);
  }

}
