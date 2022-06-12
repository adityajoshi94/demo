<?php

namespace Drupal\apigee_edge\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a status property element.
 *
 * @RenderElement("status_property")
 */
class StatusPropertyElement extends RenderElement {

  /**
   * Indicator status configuration id: OK.
   *
   * @var string
   */
  public const INDICATOR_STATUS_OK = 'indicator_status_ok';

  /**
   * Indicator status configuration id: Warning.
   *
   * @var string
   */
  public const INDICATOR_STATUS_WARNING = 'indicator_status_warning';

  /**
   * Indicator status configuration id: Error.
   *
   * @var string
   */
  public const INDICATOR_STATUS_ERROR = 'indicator_status_error';

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return [
      '#theme' => 'status_property',
      '#value' => '',
      '#indicator_status' => '',
      '#pre_render' => [
        [$class, 'preRenderStatusProperty'],
      ],
    ];
  }

  /**
   * Prepare the render array for the template.
   *
   * @param array $element
   *   A renderable array.
   *
   * @return array
   *   A renderable array.
   */
  public static function preRenderStatusProperty(array $element): array {
    $element['#attached']['library'][] = 'apigee_edge/apigee_edge.status_property';
    return $element;
  }

}
