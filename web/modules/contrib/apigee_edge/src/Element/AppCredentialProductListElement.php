<?php

namespace Drupal\apigee_edge\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a product listing element for app credentials.
 *
 * @RenderElement("app_credential_product_list")
 */
class AppCredentialProductListElement extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    return [
      '#credential_products' => NULL,
      '#theme' => 'app_credential_product_list',
    ];
  }

}
