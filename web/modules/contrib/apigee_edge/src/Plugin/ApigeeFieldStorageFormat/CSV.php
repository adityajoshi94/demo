<?php

namespace Drupal\apigee_edge\Plugin\ApigeeFieldStorageFormat;

use Drupal\apigee_edge\Plugin\FieldStorageFormatInterface;

/**
 * CSV formatter for Apigee Edge field storage.
 *
 * @ApigeeFieldStorageFormat(
 *   id = "csv",
 *   label = "CSV",
 *   fields = {
 *     "boolean",
 *     "float",
 *     "integer",
 *     "decimal",
 *     "list_float",
 *     "list_integer",
 *     "list_string",
 *     "string",
 *     "string_long",
 *     "email",
 *     "timestamp"
 *   },
 *   weight = -1,
 * )
 *
 * This class uses an internal method to generate the CSV file that builds on
 * the CSV functions in PHP. This is because the CsvEncoder in Symfony always
 * writes the header.
 *
 * @see https://github.com/symfony/symfony/issues/27447
 */
class CSV implements FieldStorageFormatInterface {

  /**
   * {@inheritdoc}
   */
  public function encode(array $data): string {
    $values = array_map(function (array $item) {
      return $item['value'];
    }, $data);
    return trim($this->writeCommaSeparatedValues([$values]));
  }

  /**
   * {@inheritdoc}
   */
  public function decode(string $data): array {
    $data = trim($data) . PHP_EOL;
    $values = $this->readCommaSeparatedValues($data);
    $result = [];
    $it = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($values));
    foreach ($it as $v) {
      $result[] = ['value' => $v];
    }

    return $result;
  }

  /**
   * Writes the CSV data into a string.
   *
   * @param array $data
   *   CSV data.
   *
   * @return string
   *   Encoded CSV.
   */
  protected function writeCommaSeparatedValues(array $data): string {
    $handle = fopen("php://temp", "w+");

    foreach ($data as $row) {
      fputcsv($handle, $row);
    }

    rewind($handle);
    $value = stream_get_contents($handle);
    fclose($handle);

    return $value;
  }

  /**
   * Reads the CSV data from a string.
   *
   * @param string $data
   *   CSV data.
   *
   * @return array
   *   Decoded CSV.
   */
  protected function readCommaSeparatedValues(string $data): array {
    $handle = fopen("php://temp", "r+");
    fwrite($handle, $data);
    rewind($handle);

    $result = [];

    while (($cols = fgetcsv($handle, 0))) {
      $result[] = $cols;
    }

    fclose($handle);

    return $result;
  }

}
