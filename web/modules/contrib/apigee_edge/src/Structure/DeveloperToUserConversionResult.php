<?php

namespace Drupal\apigee_edge\Structure;

use Drupal\user\UserInterface;

/**
 * Contains the result of a developer to Drupal user conversion.
 */
final class DeveloperToUserConversionResult extends UserDeveloperConversionResult {

  /**
   * The result of the conversion.
   *
   * @var \Drupal\user\UserInterface
   */
  private $user;

  /**
   * DeveloperToUserConversionResult constructor.
   *
   * @param \Drupal\user\UserInterface $user
   *   The result of the conversion.
   * @param int $successfully_appliedchanges
   *   Number of successfully applied _necessary_ changes.
   *   (It should not contains redundant changes, ex.: when the property value
   *   has not changed.)
   * @param \Drupal\apigee_edge\Exception\UserDeveloperConversionException[] $problems
   *   Problems occurred meanwhile the conversion (ex.: field validation errors,
   *   etc.)
   */
  public function __construct(UserInterface $user, int $successfully_appliedchanges, array $problems = []) {
    $this->user = $user;
    parent::__construct($successfully_appliedchanges, $problems);
  }

  /**
   * The created Drupal user from a developer.
   *
   * @return \Drupal\user\UserInterface
   *   User object.
   */
  public function getUser(): UserInterface {
    return $this->user;
  }

}
