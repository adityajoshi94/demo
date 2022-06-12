<?php

namespace Drupal\apigee_edge\Job;

use Drupal\apigee_edge\Structure\DeveloperToUserConversionResult;

/**
 * A job to create a Drupal user from an Apigee Edge developer.
 */
class UserCreate extends UserCreateUpdate {

  /**
   * {@inheritdoc}
   */
  protected function afterUserSave(DeveloperToUserConversionResult $result): void {
    $context = [];
    // If user could be saved.
    if ($result->getUser()->id()) {
      $context['link'] = $result->getUser()->toLink(t('View user'))->toString();
    }
    // Only log problems after a user has been saved because this way we can
    // provide an link to its profile page in log entries.
    $this->logConversionProblems($result->getProblems(), $context);
    parent::afterUserSave($result);
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return t('Copying developer (@email) from Apigee Edge.', [
      '@email' => $this->email,
    ])->render();
  }

}
