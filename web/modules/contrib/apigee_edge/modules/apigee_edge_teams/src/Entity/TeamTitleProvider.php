<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\apigee_edge\Entity\EdgeEntityTitleProvider;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Team specific title additions and overrides.
 */
class TeamTitleProvider extends EdgeEntityTitleProvider {

  /**
   * Provides a title for the team members listing page.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The route match.
   * @param \Drupal\Core\Entity\EntityInterface $_entity
   *   (optional) An entity, passed in directly from the request attributes.
   *
   * @return string|null
   *   The title for the team members listing page, null if an entity was found.
   */
  public function teamMembersList(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('@entity_type Members', [
        '@entity_type' => ucfirst($this->entityTypeManager->getDefinition($entity->getEntityTypeId())->getSingularLabel()),
      ]);
    }
  }

}
