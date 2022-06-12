<?php

namespace Drupal\apigee_edge\Entity\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * General form handler for developer/team (company) app delete forms.
 */
class AppDeleteForm extends EdgeEntityDeleteForm {

  /**
   * {@inheritdoc}
   */
  protected function verificationCodeErrorMessage() {
    return $this->t('The name does not match the @app you are attempting to delete.', [
      '@app' => mb_strtolower($this->entityTypeManager->getDefinition($this->getEntity()->getEntityTypeId())->getSingularLabel()),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  protected function verificationCode() {
    /** @var \Drupal\apigee_edge\Entity\AppInterface $app */
    $app = $this->getEntity();
    // Request the name of the app instead of the app id (UUID).
    return $app->getName();
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityFromRouteMatch(RouteMatchInterface $route_match, $entity_type_id) {
    // Always expect that the parameter in the route is not the entity type
    // (ex: {developer_app}) in case of apps rather just {app}.
    if ($route_match->getRawParameter('app') !== NULL) {
      $entity = $route_match->getParameter('app');
    }
    else {
      $entity = parent::getEntityFromRouteMatch($route_match, $entity_type_id);
    }
    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->getRedirectUrl();
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $form_state->setRedirectUrl($this->getRedirectUrl());
  }

}
