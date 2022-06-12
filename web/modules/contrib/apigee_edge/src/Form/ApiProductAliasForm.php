<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing API Product entity labels.
 */
class ApiProductAliasForm extends EdgeEntityAliasConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_api_product_alias_form';
  }

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
  protected function entityTypeName(): string {
    return $this->t('API Product');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalSingularLabel(): string {
    return $this->t('API');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalPluralLabel(): string {
    return $this->t('APIs');
  }

}
