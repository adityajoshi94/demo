<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing API Product caching related settings.
 */
class ApiProductCachingForm extends EdgeEntityCacheConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'apigee_edge.api_product_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_api_product_caching_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityType(): string {
    return 'api_product';
  }

}
