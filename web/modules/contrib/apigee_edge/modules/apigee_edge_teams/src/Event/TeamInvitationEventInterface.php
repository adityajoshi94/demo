<?php

namespace Drupal\apigee_edge_teams\Event;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;

/**
 * Defines an interface for team_invitation events.
 */
interface TeamInvitationEventInterface {

  /**
   * Returns the team_invitation entity.
   *
   * @return \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface
   *   The team invitation.
   */
  public function getTeamInvitation(): TeamInvitationInterface;

}
