<?php

namespace Drupal\apigee_m10n\Form;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a form to to refresh prepaid balance.
 */
class PrepaidBalanceRefreshForm extends FormBase {

  /**
   * Success message for form.
   */
  const SUCCESS_MESSAGE = 'Prepaid balance successfully refreshed.';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'prepaid_balance_refresh_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, array $tags = []) {
    $form_state->set('tags', $tags);

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Refresh'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Invalidate cache tags.
    if ($tags = $form_state->get('tags')) {
      Cache::invalidateTags($tags);

      $this->messenger()->addStatus($this->t(static::SUCCESS_MESSAGE));
    }
  }

}
