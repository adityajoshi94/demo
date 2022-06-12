<?php

namespace Drupal\apigee_asyncapi_doc\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'AsyncAPI' formatter.
 *
 * @FieldFormatter(
 *   id = "apigee_asyncapi_doc_async",
 *   label = @Translation("AsyncAPI"),
 *   field_types = {
 *     "file_link"
 *   }
 * )
 */
class AsyncapiFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'apigee_asyncapi_doc_file_link_field_item',
        '#field_name' => $this->fieldDefinition->getName(),
        '#delta' => $delta,
        '#link' => $item->getUrl()->toString(),
      ];
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function view(FieldItemListInterface $items, $langcode = NULL) {
    $element = parent::view($items, $langcode);

    $async_urls = [];
    foreach ($items as $delta => $item) {
      /** @var \Drupal\link\Plugin\Field\FieldType\LinkItem $item */
      // Not validating URLs or paths.
      $async_urls[] = $item->getUrl()->toString();
    }

    return $this->attachLibraries($element, $async_urls);
  }

  /**
   * Helper function to attach library definitions and pass JavaScript settings.
   *
   * @param array $element
   *   A renderable array of the field element.
   * @param array $async_urls
   *   An array of async Urls.
   *
   * @return array
   *   A renderable array of the field element with attached libraries.
   */
  private function attachLibraries(array $element, array $async_urls) {
    if (!empty($async_urls)) {
      $element['#attached'] = [
        'library' => [
          'apigee_asyncapi_doc/reactjs',
          'apigee_asyncapi_doc/asyncapi',
        ],
      ];
    }
    return $element;
  }

}
