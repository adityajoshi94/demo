<?php

namespace Drupal\apigee_edge\Plugin\ApigeeFieldStorageFormat;

use Drupal\apigee_edge\Plugin\FieldStorageFormatInterface;

/**
 * JSON formatter for Apigee Edge field storage.
 *
 * @ApigeeFieldStorageFormat(
 *   id = "json",
 *   label = "JSON",
 *   fields = { "*" },
 *   weight = 1000,
 * )
 */
class JSON implements FieldStorageFormatInterface {

  /**
   * {@inheritdoc}
   */
  public function encode(array $data): string {
    return json_encode($data);
  }

  /**
   * {@inheritdoc}
   */
  public function decode(string $data): array {
    return json_decode($data, TRUE);
  }

}
