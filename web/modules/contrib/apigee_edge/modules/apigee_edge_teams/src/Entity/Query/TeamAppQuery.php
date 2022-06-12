<?php

namespace Drupal\apigee_edge_teams\Entity\Query;

use Apigee\Edge\Api\Management\Controller\AppByOwnerControllerInterface;
use Drupal\apigee_edge\Entity\Query\AppQueryBase;

/**
 * Defines an entity query class for team app entities.
 */
class TeamAppQuery extends AppQueryBase {

  /**
   * {@inheritdoc}
   */
  protected function appOwnerConditionFields() : array {
    return ['companyName', 'team'];
  }

  /**
   * {@inheritdoc}
   */
  protected function appByOwnerController(string $owner): AppByOwnerControllerInterface {
    /** @var \Drupal\apigee_edge_teams\Entity\Controller\TeamAppControllerFactoryInterface $team_app_controller_factory */
    $team_app_controller_factory = \Drupal::service('apigee_edge_teams.controller.team_app_controller_factory');
    return $team_app_controller_factory->teamAppController($owner);
  }

}
