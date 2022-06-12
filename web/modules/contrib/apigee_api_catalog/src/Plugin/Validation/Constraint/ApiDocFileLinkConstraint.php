<?php

namespace Drupal\apigee_api_catalog\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks for valid file_link.
 *
 * @Constraint(
 *   id = "ApiDocFileLink",
 *   label = @Translation("Checks for valid file_link.", context = "Validation"),
 *   type = "string"
 * )
 */
class ApiDocFileLinkConstraint extends Constraint {

  /**
   * Message to be shown when it is not a valid link.
   *
   * @var string
   */
  public $notValid = '%value is not a valid link';

  /**
   * Message to be shown when it is not a valid link.
   *
   * @var string
   */
  public $urlParseError = 'The following error occurred while getting the link URL: @error';

}
