<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge\Entity\Form\EdgeEntityDeleteForm;

/**
 * General form handler for the team delete forms.
 */
class TeamDeleteForm extends EdgeEntityDeleteForm {

  /**
   * {@inheritdoc}
   */
  protected function verificationCodeErrorMessage() {
    return $this->t('The name does not match the @entity you are attempting to delete.', [
      '@entity' => mb_strtolower($this->entityTypeManager->getDefinition($this->getEntity()->getEntityTypeId())->getSingularLabel()),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl() {
    $entity = $this->getEntity();
    if ($entity->hasLinkTemplate('collection-by-team')) {
      return $entity->toUrl('collection-by-team');
    }
    return parent::getRedirectUrl();
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    $original = parent::getDescription();

    return $this->t('<strong>All apps, credentials and @team membership information will be deleted.</strong> @original', [
      '@original' => $original,
      '@team' => mb_strtolower($this->entityTypeManager->getDefinition($this->entity->getEntityTypeId())->getSingularLabel()),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->getRedirectUrl();
  }

}
