<?php

namespace Drupal\apigee_asyncapi_doc\Form;

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
    return 'apigee_asyncapi_doc_confirm_remove_views_references';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to remove references of AsyncAPI for Apigee in views before uninstallation of the module?');
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
      if ($filters['type']['value']['asyncapi_doc']) {
        unset($filters['type']['value']['asyncapi_doc']);
      }
      if (isset($filters['type_1']) && $filters['type_1']['value']['asyncapi_doc']) {
        unset($filters['type_1']['value']['asyncapi_doc']);
      }
      $view->display_handler->overrideOption('filters', $filters);

      $view->save();

      $this->messenger()->addStatus($this->t('Updating Views - API Catalog'));
    }

    $view = Views::getView('api_catalog_admin');
    if (is_object($view)) {
      $display = $view->getDisplay();

      $filters = $view->display_handler->getOption('filters');
      if ($filters['type']['value']['asyncapi_doc']) {
        unset($filters['type']['value']['asyncapi_doc']);
      }
      if (isset($filters['type_1']) && $filters['type_1']['value']['asyncapi_doc']) {
        unset($filters['type_1']['value']['asyncapi_doc']);
      }
      $view->display_handler->overrideOption('filters', $filters);

      $view->save();

      $this->messenger()->addStatus($this->t('Updating Views - API Catalog Admin'));
    }

    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
