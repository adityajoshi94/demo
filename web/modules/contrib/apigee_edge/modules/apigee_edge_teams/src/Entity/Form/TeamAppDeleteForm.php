<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge\Entity\Form\AppDeleteForm;

/**
 * Dedicated form handler that allows a developer to delete a team app.
 */
class TeamAppDeleteForm extends AppDeleteForm {

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl() {
    $entity = $this->getEntity();
    return $entity->toUrl('collection-by-team');
  }

}
