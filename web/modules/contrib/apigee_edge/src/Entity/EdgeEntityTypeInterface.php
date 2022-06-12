<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Provides an interface for an Apigee Edge entity type and its metadata.
 */
interface EdgeEntityTypeInterface extends EntityTypeInterface {

  /**
   * Returns the fully-qualified class name of the query class for this entity.
   *
   * @return string
   *   The FQCN of the query class.
   */
  public function getQueryClass(): string;

}
