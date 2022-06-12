<?php

namespace Drupal\apigee_edge\Structure;

/**
 * Base class for user-developer conversion results.
 *
 * @internal
 */
class UserDeveloperConversionResult {

  /**
   * Number of successfully applied _necessary_ changes.
   *
   * @var int
   */
  protected $successfullyAppliedChanges;

  /**
   * Problems occurred meanwhile the conversion.
   *
   * @var \Drupal\apigee_edge\Exception\UserDeveloperConversionException[]
   */
  protected $problems;

  /**
   * UserDeveloperConversionResult constructor.
   *
   * @param int $successfully_applied_changes
   *   Number of successfully applied _necessary_ changes.
   *   (It should not contains redundant changes, ex.: when the property value
   *   has not changed.)
   * @param \Drupal\apigee_edge\Exception\UserDeveloperConversionException[] $problems
   *   Problems occurred meanwhile the conversion (ex.: field validation errors,
   *   etc.)
   */
  public function __construct(int $successfully_applied_changes, array $problems = []) {
    $this->successfullyAppliedChanges = $successfully_applied_changes;
    $this->problems = $problems;
  }

  /**
   * Number of _necessary_ changes that were successfully applied.
   *
   * @return int
   *   Number of changes.
   */
  public function getSuccessfullyAppliedChanges(): int {
    return $this->successfullyAppliedChanges;
  }

  /**
   * Problems occurred meanwhile the conversion.
   *
   * @return \Drupal\apigee_edge\Exception\UserDeveloperConversionException[]
   *   Array of problems.
   */
  public function getProblems(): array {
    return $this->problems;
  }

}
