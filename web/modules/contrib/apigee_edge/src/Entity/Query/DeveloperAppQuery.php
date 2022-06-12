<?php

namespace Drupal\apigee_edge\Entity\Query;

use Apigee\Edge\Api\Management\Controller\AppByOwnerControllerInterface;

/**
 * Defines an entity query class for developer app entities.
 */
class DeveloperAppQuery extends AppQueryBase {

  /**
   * {@inheritdoc}
   */
  protected function appOwnerConditionFields() : array {
    return ['developerId', 'email'];
  }

  /**
   * {@inheritdoc}
   */
  protected function appByOwnerController(string $owner): AppByOwnerControllerInterface {
    /** @var \Drupal\apigee_edge\Entity\Controller\DeveloperAppControllerFactoryInterface $dev_app_controller_factory */
    $dev_app_controller_factory = \Drupal::service('apigee_edge.controller.developer_app_controller_factory');
    return $dev_app_controller_factory->developerAppController($owner);
  }

}
