<?php

namespace Drupal\apigee_graphql_doc\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\views\Views;

/**
 * Provides a confirmation form before clearing out the references in views.
 */
class ConfirmRemoveViewsReferencesForm extends ConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_graphql_doc_confirm_remove_views_references';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to remove references of GraphQL in views before uninstallation of the module?');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('system.modules_uninstall');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $view = Views::getView('apigee_api_catalog');
    if (is_object($view)) {
      $display = $view->getDisplay();

      $filters = $view->display_handler->getOption('filters');
      if ($filters['type']['value']['graphql_doc']) {
        unset($filters['type']['value']['graphql_doc']);
      }
      if (isset($filters['type_1']) && $filters['type_1']['value']['graphql_doc']) {
        unset($filters['type_1']['value']['graphql_doc']);
      }
      $view->display_handler->overrideOption('filters', $filters);

      $view->save();

      $this->messenger()->addStatus($this->t('Updating Views - API Catalog'));
    }

    $view = Views::getView('api_catalog_admin');
    if (is_object($view)) {
      $display = $view->getDisplay();

      $filters = $view->display_handler->getOption('filters');
      if ($filters['type']['value']['graphql_doc']) {
        unset($filters['type']['value']['graphql_doc']);
      }
      if (isset($filters['type_1']) && $filters['type_1']['value']['graphql_doc']) {
        unset($filters['type_1']['value']['graphql_doc']);
      }
      $view->display_handler->overrideOption('filters', $filters);

      $view->save();

      $this->messenger()->addStatus($this->t('Updating Views - API Catalog Admin'));
    }

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
