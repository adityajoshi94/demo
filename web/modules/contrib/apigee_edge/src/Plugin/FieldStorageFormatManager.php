<?php

namespace Drupal\apigee_edge\Plugin;

use Drupal\apigee_edge\Annotation\ApigeeFieldStorageFormat;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides a FieldStorageFormat plugin manager.
 */
class FieldStorageFormatManager extends DefaultPluginManager implements FieldStorageFormatManagerInterface {

  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache, ModuleHandlerInterface $module_handler) {
    parent::__construct(
      'Plugin/ApigeeFieldStorageFormat',
      $namespaces,
      $module_handler,
      FieldStorageFormatInterface::class,
      ApigeeFieldStorageFormat::class
    );
    $this->alterInfo('apigee_field_storage_format_info');
    $this->setCacheBackend($cache, 'apigee_field_storage_format_plugins');
  }

  /**
   * {@inheritdoc}
   */
  protected function findDefinitions(): array {
    $definitions = parent::findDefinitions();
    uasort($definitions, function (array $def0, array $def1) {
      return ($def0['weight'] ?? 0) <=> ($def1['weight'] ?? 0);
    });

    return $definitions;
  }

  /**
   * {@inheritdoc}
   */
  public function lookupPluginForFieldType(string $field_type): ?FieldStorageFormatInterface {
    $definitions = $this->getDefinitions();

    foreach ($definitions as $name => $definition) {
      $fields = $definition['fields'] ?? [];

      if (in_array($field_type, $fields) || in_array('*', $fields)) {
        /** @var \Drupal\apigee_edge\Plugin\FieldStorageFormatInterface $instance */
        $instance = $this->createInstance($name);
        return $instance;
      }
    }

    return NULL;
  }

}
