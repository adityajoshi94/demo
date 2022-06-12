<?php

namespace Drupal\apigee_edge_teams\Entity\Storage;

use Drupal\Core\Entity\EntityStorageInterface;

/**
 * Defines an interface for team_invitation storage.
 */
interface TeamInvitationStorageInterface extends EntityStorageInterface {

  /**
   * Returns all team_invitation entities for the provided email and team id.
   *
   * @param string $email
   *   The email address.
   * @param string|null $team_id
   *   The team id.
   *
   * @return \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface[]
   *   An array of team_invitation entities for this email address.
   */
  public function loadByRecipient(string $email, ?string $team_id = NULL): array;

  /**
   * Returns all team_invitation entities set to expire.
   *
   * @return \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface[]
   *   An array of team_invitations entities set to expire.
   */
  public function getInvitationsToExpire(): array;

}
