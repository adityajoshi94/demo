<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing Developer App caching related settings.
 */
class DeveloperAppCachingForm extends EdgeEntityCacheConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'apigee_edge.developer_app_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_app_caching_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityType(): string {
    return 'developer_app';
  }

}
