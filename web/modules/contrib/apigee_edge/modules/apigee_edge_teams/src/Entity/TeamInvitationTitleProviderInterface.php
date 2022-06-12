<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Provides an interface for team_invitation title provider.
 */
interface TeamInvitationTitleProviderInterface {

  /**
   * Provides the accept title for a team_invitation.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   * @param \Drupal\Core\Entity\EntityInterface $_entity
   *   (optional) An entity, passed in directly from the request attributes.
   *
   * @return string|null
   *   The title for the entity accept page.
   */
  public function acceptTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL);

  /**
   * Provides the decline title for a team_invitation.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   * @param \Drupal\Core\Entity\EntityInterface $_entity
   *   (optional) An entity, passed in directly from the request attributes.
   *
   * @return string|null
   *   The title for the entity decline page.
   */
  public function declineTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL);

  /**
   * Provides the resend title for a team_invitation.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   * @param \Drupal\Core\Entity\EntityInterface $_entity
   *   (optional) An entity, passed in directly from the request attributes.
   *
   * @return string|null
   *   The title for the entity resend page.
   */
  public function resendTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL);

}
