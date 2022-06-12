<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Form\AppAnalyticsFormBase;

/**
 * Displays the analytics page of a team app on the UI.
 */
class TeamAppAnalyticsForm extends AppAnalyticsFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_teams_team_app_analytics';
  }

  /**
   * {@inheritdoc}
   */
  protected function getAnalyticsFilterCriteriaByAppOwner(AppInterface $app): string {
    return "developer eq '{$this->connector->getOrganization()}@@@{$app->getAppOwner()}'";
  }

}
