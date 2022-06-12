<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines an exception for Apigee Edge key provider problems.
 */
class KeyProviderRequirementsException extends RuntimeException {

  /**
   * The TranslatableMarkup object containing a message to render on the UI.
   *
   * @var \Drupal\Core\StringTranslation\TranslatableMarkup
   */
  protected $translatableMarkupMessage;

  /**
   * KeyProviderRequirementsException constructor.
   *
   * @param string $message
   *   The Exception message.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $translatable_markup_message
   *   The translatable markup object of the exception to display on the pages
   *   where the exception is caught.
   * @param int|null $code
   *   The error code.
   * @param \Throwable|null $previous
   *   The previous throwable used for the exception chaining.
   */
  public function __construct(string $message, TranslatableMarkup $translatable_markup_message = NULL, int $code = 0, \Throwable $previous = NULL) {
    $this->translatableMarkupMessage = $translatable_markup_message;
    parent::__construct($message, $code, $previous);
  }

  /**
   * Gets the translatable markup object.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   The translatable markup object.
   */
  public function getTranslatableMarkupMessage(): TranslatableMarkup {
    return $this->translatableMarkupMessage ?? $this->t('Key provider error: @error', ['@error' => $this->message]);
  }

}
