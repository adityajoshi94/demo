<?php

namespace Drupal\apigee_edge\Job;

use Drupal\apigee_edge\Exception\DeveloperToUserConversationInvalidValueException;
use Drupal\apigee_edge\Structure\DeveloperToUserConversionResult;

/**
 * A job to update a Drupal user based on an Apigee Edge developer.
 */
class UserUpdate extends UserCreateUpdate {

  /**
   * {@inheritdoc}
   */
  protected function beforeUserSave(DeveloperToUserConversionResult $result): void {
    parent::beforeUserSave($result);

    /** @var \Drupal\user\UserInterface $original_user */
    $original_user = \Drupal::entityTypeManager()->getStorage('user')->loadUnchanged($result->getUser()->id());
    // Even if the developer has been blocked in Apigee Edge we should not block
    // its Drupal user automatically when syncing.
    if ($original_user->isActive() && $result->getUser()->isBlocked()) {
      $result->getUser()->activate();
    }

    $context = [
      'link' => $result->getUser()->toLink(t('View user'))->toString(),
    ];
    $this->logConversionProblems($result->getProblems(), $context);

    // Rollback a synchronised field's value if the related attribute's value
    // contained an incorrect field value.
    if (count($result->getProblems()) > 0) {
      /** @var \Drupal\user\UserInterface $original_user */
      foreach ($result->getProblems() as $problem) {
        // Do not apply rollback on base fields.
        if ($problem instanceof DeveloperToUserConversationInvalidValueException && !in_array($problem->getTarget(), $this->userDeveloperConverter()::DEVELOPER_PROP_USER_BASE_FIELD_MAP, TRUE)) {
          $result->getUser()->set($problem->getTarget(), $original_user->get($problem->getTarget())->getValue());
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function __toString(): string {
    return t('Updating user (@email) from Apigee Edge.', [
      '@email' => $this->email,
    ])->render();
  }

}
