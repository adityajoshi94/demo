<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing Developer caching related settings.
 */
class DeveloperCachingForm extends EdgeEntityCacheConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['apigee_edge.developer_settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_developer_caching_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityType(): string {
    return 'developer';
  }

}
