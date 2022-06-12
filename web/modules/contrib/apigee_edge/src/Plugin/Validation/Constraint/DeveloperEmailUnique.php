<?php

namespace Drupal\apigee_edge\Plugin\Validation\Constraint;

use Drupal\apigee_edge\Form\DeveloperSettingsForm;
use Symfony\Component\Validator\Constraint;

/**
 * Checks if an email address already belongs to a developer on Apigee Edge.
 *
 * @Constraint(
 *   id = "DeveloperMailUnique",
 *   label = @Translation("Developer email unique", context = "Validation"),
 *   type = { "email" }
 * )
 */
class DeveloperEmailUnique extends Constraint {

  /**
   * Error message to display.
   *
   * @var string
   */
  public $message;

  /**
   * {@inheritdoc}
   */
  public function __construct($options = NULL) {
    parent::__construct($options);
    $config = \Drupal::config('apigee_edge.developer_settings');
    if ($config->get('verification_action') == DeveloperSettingsForm::VERIFICATION_ACTION_DISPLAY_ERROR_ONLY) {
      $this->message = $config->get('display_only_error_message_content.value');
    }
    elseif ($config->get('verification_action') == DeveloperSettingsForm::VERIFICATION_ACTION_VERIFY_EMAIL) {
      $this->message = $config->get('verify_email_error_message.value');
    }
  }

}
