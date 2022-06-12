<?php

namespace Drupal\apigee_edge_teams;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;

/**
 * Base definition of the team context manager service.
 */
interface TeamContextManagerInterface {

  /**
   * The name of the route option for developer.
   */
  const DEVELOPER_ROUTE_OPTION_NAME = '_apigee_developer_route';

  /**
   * The name of the route option for team.
   */
  const TEAM_ROUTE_OPTION_NAME = '_apigee_team_route';

  /**
   * Determines the current context from the route.
   *
   * @return \Drupal\Core\Entity\EntityInterface|null
   *   The current entity or NULL.
   */
  public function getCurrentContextEntity(): ?EntityInterface;

  /**
   * Returns the destination url for the given entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The developer or team entity.
   *
   * @return \Drupal\Core\Url|null
   *   The destination URL.
   */
  public function getDestinationUrlForEntity(EntityInterface $entity): ?Url;

  /**
   * Gets the corresponding route name for the given entity.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The developer or team entity.
   *
   * @return null|string
   *   The corresponding route name if one is detected.
   */
  public function getCorrespondingRouteNameForEntity(EntityInterface $entity): ?string;

}
