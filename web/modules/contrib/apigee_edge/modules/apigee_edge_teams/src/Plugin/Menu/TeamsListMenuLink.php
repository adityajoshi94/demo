<?php

namespace Drupal\apigee_edge_teams\Plugin\Menu;

use Drupal\Core\Menu\MenuLinkDefault;

/**
 * Provides a default team linting page menu link.
 */
class TeamsListMenuLink extends MenuLinkDefault {

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    // Use the same title as the page.
    return apigee_edge_teams_team_listing_page_title();
  }

}
