<?php

namespace Drupal\apigee_edge\Entity\Form;

use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Interface FieldableEdgeEntityFormInterface.
 *
 * Based on ContentEntityFormInterface-
 *
 * @see \Drupal\Core\Entity\ContentEntityFormInterface
 */
interface FieldableEdgeEntityFormInterface extends EdgeEntityFormInterface {

  /**
   * Gets the form display.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return \Drupal\Core\Entity\Display\EntityFormDisplayInterface
   *   The current form display.
   */
  public function getFormDisplay(FormStateInterface $form_state);

  /**
   * Sets the form display.
   *
   * Sets the form display which will be used for populating form element
   * defaults.
   *
   * @param \Drupal\Core\Entity\Display\EntityFormDisplayInterface $form_display
   *   The form display that the current form operates with.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return $this
   */
  public function setFormDisplay(EntityFormDisplayInterface $form_display, FormStateInterface $form_state);

}
