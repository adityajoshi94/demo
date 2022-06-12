<?php

namespace Drupal\apigee_edge\Entity\Form;

/**
 * Dedicated form handler that allows a developer to delete its own app.
 */
class DeveloperAppDeleteFormForDeveloper extends AppDeleteForm {

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl() {
    $entity = $this->getEntity();
    return $entity->toUrl('collection-by-developer');
  }

}
