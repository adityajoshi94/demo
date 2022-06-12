<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\FieldableEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\user\UserInterface;

/**
 * Definition of an entity that stores team member's roles within a team.
 */
interface TeamMemberRoleInterface extends FieldableEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  /**
   * Returns the developer's user entity.
   *
   * @return \Drupal\user\UserInterface|null
   *   The developer's user entity or null if the entity is new and it has not
   *   been set yet.
   */
  public function getDeveloper(): ?UserInterface;

  /**
   * Returns the team entity.
   *
   * @return \Drupal\apigee_edge_teams\Entity\TeamInterface|null
   *   The team entity or null if the entity is new and it has not been set
   *   yet.
   */
  public function getTeam(): ?TeamInterface;

  /**
   * Returns the team roles of the developer within the team.
   *
   * @return \Drupal\apigee_edge_teams\Entity\TeamRoleInterface[]
   *   Array of team roles or an empty array if the entity is new and it has
   *   not been set yet.
   */
  public function getTeamRoles(): array;

}
