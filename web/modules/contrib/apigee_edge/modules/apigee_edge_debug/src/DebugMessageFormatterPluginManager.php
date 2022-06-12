<?php

namespace Drupal\apigee_edge_debug;

use Drupal\apigee_edge_debug\Annotation\DebugMessageFormatter;
use Drupal\apigee_edge_debug\Plugin\DebugMessageFormatter\DebugMessageFormatterPluginInterface;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides a debug message formatter plugin manager.
 */
class DebugMessageFormatterPluginManager extends DefaultPluginManager {

  /**
   * DebugMessageFormatterPluginManager constructor.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   The cache backend.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/DebugMessageFormatter', $namespaces, $module_handler, DebugMessageFormatterPluginInterface::class, DebugMessageFormatter::class);

    $this->alterInfo('apigee_edge_debug_message_formatter_info');
    $this->setCacheBackend($cache_backend, 'apigee_edge_debug_message_formatters');
  }

}
