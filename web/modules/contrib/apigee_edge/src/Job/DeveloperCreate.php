<?php

namespace Drupal\apigee_edge\Job;

/**
 * A job to create a developer on Apigee Edge.
 */
class DeveloperCreate extends DeveloperCreateUpdate {

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return t('Copying user (@email) to Apigee Edge.', [
      '@email' => $this->email,
    ])->render();
  }

}
