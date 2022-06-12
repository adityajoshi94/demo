<?php

namespace Drupal\apigee_edge_debug\Plugin\DebugMessageFormatter;

use GuzzleHttp\TransferStats;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Defines an interface for debug message formatter plugins.
 */
interface DebugMessageFormatterPluginInterface {

  /**
   * Returns the ID of the debug message formatter plugin.
   *
   * @return string
   *   The ID of the debug message formatter plugin.
   */
  public function getId(): string;

  /**
   * Returns the label of the debug message formatter plugin.
   *
   * @return string
   *   The label of the debug message formatter plugin.
   */
  public function getLabel(): string;

  /**
   * Formats a request.
   *
   * @param \Psr\Http\Message\RequestInterface $request
   *   Request object.
   *
   * @return string
   *   Formatted request.
   */
  public function formatRequest(RequestInterface $request): string;

  /**
   * Formats a response.
   *
   * @param \Psr\Http\Message\ResponseInterface $response
   *   Response object.
   * @param \Psr\Http\Message\RequestInterface $request
   *   Request object that triggered the response.
   *
   * @return string
   *   Formatted response.
   */
  public function formatResponse(ResponseInterface $response, RequestInterface $request): string;

  /**
   * Formats stats object.
   *
   * @param \GuzzleHttp\TransferStats $stats
   *   Transfer statistics.
   *
   * @return string
   *   Formatted output.
   */
  public function formatStats(TransferStats $stats): string;

}
