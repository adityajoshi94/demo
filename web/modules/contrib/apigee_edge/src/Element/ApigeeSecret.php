<?php

namespace Drupal\apigee_edge\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a secret element.
 *
 * @RenderElement("apigee_secret")
 */
class ApigeeSecret extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      '#theme' => 'apigee_secret',
      '#value' => NULL,
    ];
  }

}
