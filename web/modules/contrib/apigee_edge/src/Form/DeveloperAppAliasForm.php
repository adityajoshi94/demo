<?php

namespace Drupal\apigee_edge\Form;

/**
 * Provides a form for changing Developer App aliases.
 */
class DeveloperAppAliasForm extends EdgeEntityAliasConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_app_alias_form';
  }

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
  protected function entityTypeName(): string {
    return $this->t('Developer App');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalSingularLabel(): string {
    return $this->t('App');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalPluralLabel(): string {
    return $this->t('Apps');
  }

}
