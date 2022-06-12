<?php

namespace Drupal\apigee_edge_teams\Event;

/**
 * Defines a list of events.
 */
final class TeamInvitationEvents {

  /**
   * Name of the event fired after a team_invitation is created.
   */
  const CREATED = "apigee_edge_teams.team_invitation.created";

  /**
   * Name of event fired after a team_invitation is accepted.
   */
  const ACCEPTED = "apigee_edge_teams.team_invitation.accepted";

  /**
   * Name of the event fired after a team_invitation is declined.
   */
  const DECLINED = "apigee_edge_teams.team_invitation.declined";

  /**
   * Name of the event fired after a team_invitation is cancelled.
   */
  const CANCELLED = "apigee_edge_teams.team_invitation.cancelled";

  /**
   * Name of the event fired after a team_invitation is deleted.
   */
  const DELETED = "apigee_edge_teams.team_invitation.deleted";

}
