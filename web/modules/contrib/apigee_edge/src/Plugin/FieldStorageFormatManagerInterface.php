<?php

namespace Drupal\apigee_edge\Plugin;

use Drupal\Component\Plugin\Discovery\CachedDiscoveryInterface;
use Drupal\Component\Plugin\PluginManagerInterface;

/**
 * Field storage formatter plugin definition.
 */
interface FieldStorageFormatManagerInterface extends PluginManagerInterface, CachedDiscoveryInterface {

  /**
   * Finds a plugin to format a given field type.
   *
   * @param string $field_type
   *   Field type.
   *
   * @return \Drupal\apigee_edge\Plugin\FieldStorageFormatInterface|null
   *   Storage formatter if found. NULL if not.
   */
  public function lookupPluginForFieldType(string $field_type): ?FieldStorageFormatInterface;

}
