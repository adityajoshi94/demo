<?php

namespace Drupal\apigee_edge\Entity\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Dedicated form handler that allows a developer to edit its developer app.
 */
class DeveloperAppEditFormForDeveloper extends DeveloperAppEditForm {

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl(): Url {
    $entity = $this->getEntity();
    return $entity->toUrl('canonical-by-developer');
  }

  /**
   * {@inheritdoc}
   */
  protected function actions(array $form, FormStateInterface $form_state) {
    $actions = parent::actions($form, $form_state);
    $actions['delete']['#url'] = $this->getEntity()->toUrl('delete-form-for-developer');

    return $actions;
  }

}
