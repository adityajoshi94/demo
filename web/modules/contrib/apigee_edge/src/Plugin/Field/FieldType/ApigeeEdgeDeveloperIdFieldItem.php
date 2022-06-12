<?php

namespace Drupal\apigee_edge\Plugin\Field\FieldType;

use Drupal\apigee_edge\Entity\Developer;
use Drupal\Core\Field\FieldItemList;
use Drupal\Core\TypedData\ComputedItemListTrait;

/**
 * Definition of Apigee Edge Developer ID computed field for User entity.
 */
class ApigeeEdgeDeveloperIdFieldItem extends FieldItemList {

  use ComputedItemListTrait;

  /**
   * Computes the values for an item list.
   */
  protected function computeValue() {
    /** @var \Drupal\user\UserInterface $entity */
    $entity = $this->getEntity();

    // Make sure an email address is set.
    // There are cases (registration) where an email might not be set yet.
    if (!$entity->getEmail()) {
      return;
    }

    try {
      /** @var \Drupal\apigee_edge\Entity\Developer $developer */
      $developer = Developer::load($entity->getEmail());
      $value = $developer ? $developer->getDeveloperId() : NULL;

      $this->list[0] = $this->createItem(0, $value);
    }
    catch (\Exception $exception) {
      watchdog_exception('apigee_edge', $exception);
    }
  }

}
