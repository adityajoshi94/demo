<?php

namespace Drupal\apigee_edge_teams\Event;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Defines the team_invitation event.
 */
class TeamInvitationEvent extends Event implements TeamInvitationEventInterface {

  /**
   * The team_invitation entity.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface
   */
  protected $teamInvitation;

  /**
   * TeamInvitationEvent constructor.
   *
   * @param \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface $team_invitation
   *   The team invitation.
   */
  public function __construct(TeamInvitationInterface $team_invitation) {
    $this->teamInvitation = $team_invitation;
  }

  /**
   * {@inheritdoc}
   */
  public function getTeamInvitation(): TeamInvitationInterface {
    return $this->teamInvitation;
  }

}
