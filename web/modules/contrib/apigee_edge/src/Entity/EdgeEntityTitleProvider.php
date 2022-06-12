<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Entity\Controller\EntityController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Provides default page titles for Apigee Edge entities.
 */
class EdgeEntityTitleProvider extends EntityController {

  /**
   * {@inheritdoc}
   */
  public function title(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('@label @entity_type', [
        '@label' => $entity->label(),
        '@entity_type' => mb_strtolower($this->entityTypeManager->getDefinition($entity->getEntityTypeId())->getSingularLabel()),
      ]);
    }
    return parent::title($route_match, $_entity);
  }

  /**
   * {@inheritdoc}
   */
  public function editTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('Edit %label @entity_type', [
        '%label' => $entity->label(),
        '@entity_type' => mb_strtolower($this->entityTypeManager->getDefinition($entity->getEntityTypeId())->getSingularLabel()),
      ]);
    }
    return parent::editTitle($route_match, $_entity);
  }

  /**
   * {@inheritdoc}
   */
  public function deleteTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      // @todo Investigate why entity delete forms (confirm forms) does not
      // display this as a page title. This issue also existed before.
      return $this->t('Delete %label @entity_type', [
        '%label' => $entity->label(),
        '@entity_type' => mb_strtolower($this->entityTypeManager->getDefinition($entity->getEntityTypeId())->getSingularLabel()),
      ]);
    }
    return parent::deleteTitle($route_match, $_entity);
  }

}
