<?php

namespace Drupal\apigee_edge\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides an app credential element.
 *
 * @RenderElement("app_credential")
 */
class AppCredentialElement extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      '#credential' => NULL,
      '#app' => NULL,
      '#theme' => 'app_credential',
    ];
  }

}
