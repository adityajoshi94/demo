<?php

namespace Drupal\apigee_edge\Annotation;

use Drupal\apigee_edge\Entity\EdgeEntityType as EntityEdgeEntityType;
use Drupal\Core\Entity\Annotation\EntityType;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines an Apigee Edge entity type annotation object.
 *
 * The annotation properties of entity types are found on
 * \Drupal\apigee_edge\Entity\EdgeEntityType and are accessed using
 * get/set methods defined in
 * \Drupal\apigee_edge\Entity\EdgeEntityTypeInterface.
 *
 * @Annotation
 */
class EdgeEntityType extends EntityType {

  /**
   * {@inheritdoc}
   */
  public $entity_type_class = EntityEdgeEntityType::class;

  /**
   * {@inheritdoc}
   */
  public $group = 'apigee_edge';

  /**
   * {@inheritdoc}
   */
  public function get() {
    $this->definition['group_label'] = new TranslatableMarkup('Apigee Edge', [], ['context' => 'Entity type group']);

    return parent::get();
  }

}
