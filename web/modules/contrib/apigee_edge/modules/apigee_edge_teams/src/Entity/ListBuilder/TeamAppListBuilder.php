<?php

namespace Drupal\apigee_edge_teams\Entity\ListBuilder;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Entity\ListBuilder\AppListBuilder;

/**
 * Lists _all_ team apps.
 */
class TeamAppListBuilder extends AppListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $headers = [];

    $headers['team'] = [
      'data' => $this->t('@team', [
        '@team' => ucfirst($this->entityTypeManager->getDefinition('team')->getSingularLabel()),
      ]),
    ];

    return $headers + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  protected function buildInfoRow(AppInterface $app, array &$rows) {
    /** @var \Drupal\apigee_edge_teams\Entity\TeamAppInterface $app */
    /** @var \Drupal\apigee_edge_teams\Entity\TeamInterface[] $teams */
    $teams = $this->entityTypeManager->getStorage('team')->loadMultiple();
    $css_id = $this->getCssIdForInfoRow($app);
    $rows[$css_id]['data']['team']['data'] = $teams[$app->getCompanyName()]->access('view') ? $teams[$app->getCompanyName()]->toLink()->toRenderable() : $teams[$app->getCompanyName()]->label();
    parent::buildInfoRow($app, $rows);
  }

}
