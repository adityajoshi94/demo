<?php

namespace Drupal\apigee_edge\Plugin;

/**
 * Defines an interface for Apigee Edge field storage formatters.
 */
interface FieldStorageFormatInterface {

  /**
   * Encodes field data to the target format.
   *
   * @param array $data
   *   Data to be encoded.
   *
   * @return string
   *   Encoded data.
   */
  public function encode(array $data): string;

  /**
   * Decodes field data from the target format.
   *
   * @param string $data
   *   Encoded data.
   *
   * @return array
   *   Decoded data.
   */
  public function decode(string $data): array;

}
