<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Entity\ContentEntityDeleteForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the delete form for team_invitation.
 */
class TeamInvitationDeleteForm extends ContentEntityDeleteForm {

  /**
   * The team.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInterface
   */
  protected $team;

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to revoke the @entity-type for %recipient?', [
      '@entity-type' => $this->getEntity()->getEntityType()->getSingularLabel(),
      '%recipient' => $this->getEntity()->getRecipient(),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->team->toUrl('members');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, TeamInterface $team = NULL) {
    $this->team = $team;
    return parent::buildForm($form, $form_state);
  }

}
