<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the accept form for team_invitation.
 */
class TeamInvitationAcceptForm extends TeamInvitationFormBase {

  /**
   * {@inheritdoc}
   */
  protected $handleExpired = TRUE;

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to join the %label @team?', [
      '%label' => $this->entity->getTeam()->label(),
      '@team' => mb_strtolower($this->entity->getTeam()->getEntityType()->getSingularLabel()),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Accept invitation');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /** @var \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface $invitation */
    $invitation = $this->entity;
    $invitation->setStatus(TeamInvitationInterface::STATUS_ACCEPTED)->save();

    $this->messenger()->addMessage($this->t('You have accepted the invitation to join the %label @team.', [
      '%label' => $this->entity->getTeam()->label(),
      '@team' => mb_strtolower($this->entity->getTeam()->getEntityType()->getSingularLabel()),
    ]));

    $form_state->setRedirect('entity.team.collection');
  }

}
