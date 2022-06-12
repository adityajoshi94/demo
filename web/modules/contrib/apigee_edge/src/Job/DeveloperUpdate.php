<?php

namespace Drupal\apigee_edge\Job;

/**
 * A job to update an Apigee Edge developer based on a Drupal user.
 */
class DeveloperUpdate extends DeveloperCreateUpdate {

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return t('Updating developer (@email) in Apigee Edge.', [
      '@email' => $this->email,
    ])->render();
  }

}
