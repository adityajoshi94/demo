<?php

namespace Drupal\apigee_edge\Job;

use Drupal\apigee_edge\Exception\UserDeveloperConversionException;
use Drupal\apigee_edge\FieldAttributeConverterInterface;
use Drupal\apigee_edge\UserDeveloperConverterInterface;
use Drupal\Core\Logger\LoggerChannelInterface;

/**
 * Base trait for developer- and user create and update sync jobs.
 */
trait UserDeveloperSyncJobTrait {

  /**
   * Logger interface.
   *
   * @return \Drupal\Core\Logger\LoggerChannelInterface
   *   Logger interface.
   */
  protected function logger() : LoggerChannelInterface {
    return \Drupal::service('logger.channel.apigee_edge');
  }

  /**
   * Field-attribute converter service.
   *
   * @return \Drupal\apigee_edge\FieldAttributeConverterInterface
   *   Field-attribute converter service.
   */
  protected function fieldAttributeConverter(): FieldAttributeConverterInterface {
    return \Drupal::service('apigee_edge.converter.field_attribute');
  }

  /**
   * User-developer converter service.
   *
   * @return \Drupal\apigee_edge\UserDeveloperConverterInterface
   *   User-developer converter service.
   */
  protected function userDeveloperConverter() : UserDeveloperConverterInterface {
    return \Drupal::service('apigee_edge.converter.user_developer');
  }

  /**
   * Logs all entity conversion problems encountered meanwhile syncing.
   *
   * @param \Drupal\apigee_edge\Exception\UserDeveloperConversionException[] $problems
   *   List of encountered entity conversion problems.
   * @param array $context
   *   Additional context for log messages.
   */
  protected function logConversionProblems(array $problems, array $context = []) : void {
    foreach ($problems as $problem) {
      $this->logConversionProblem($problem, $context);
    }
  }

  /**
   * Logs an entity conversation problems encountered meanwhile syncing.
   *
   * @todo Consider to add a translatable operation to message logged by
   * recordMessage() if we actually start using that method something.
   *
   * @param \Drupal\apigee_edge\Exception\UserDeveloperConversionException $problem
   *   Entity conversion problem.
   * @param array $context
   *   Additional problem for log messages.
   */
  abstract protected function logConversionProblem(UserDeveloperConversionException $problem, array $context = []) : void;

}
