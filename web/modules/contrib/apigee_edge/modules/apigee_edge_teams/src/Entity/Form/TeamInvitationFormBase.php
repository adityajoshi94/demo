<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a base class for updating status for a team_invitation.
 */
abstract class TeamInvitationFormBase extends ContentEntityConfirmFormBase {

  /**
   * The team_invitaion entity.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface
   */
  protected $entity;

  /**
   * If set to TRUE an expired message is shown if team_invitation is expired.
   *
   * @var bool
   */
  protected $handleExpired = FALSE;

  /**
   * The team.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInterface
   */
  protected $team;

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->team->toUrl('members');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelText() {
    return $this->t('Not now');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, TeamInterface $team = NULL) {
    $this->team = $team;

    if ($this->handleExpired && $this->entity->isExpired()) {
      return [
        '#theme' => 'status_messages',
        '#message_list' => [
          'warning' => [
            $this->t('This invitation to join %team @team has expired. Please request a new one.', [
              '%team' => $this->team->label(),
              '@team' => mb_strtolower($this->entity->getTeam()->getEntityType()->getSingularLabel()),
            ]),
          ],
        ],
      ];
    };

    return parent::buildForm($form, $form_state);
  }

}
