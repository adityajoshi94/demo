<?php

namespace Drupal\apigee_edge_teams;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;

/**
 * Defines an interface for team_invitation notifiers.
 */
interface TeamInvitationNotifierInterface {

  /**
   * Sends notification for the provided team_invitation.
   *
   * @param \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface $team_invitation
   *   The team_invitation entity.
   *
   * @return bool
   *   TRUE if notifications successfully sent. FALSE otherwise.
   */
  public function sendNotificationsFor(TeamInvitationInterface $team_invitation): bool;

}
