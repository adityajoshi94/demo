<?php

namespace Drupal\apigee_m10n_teams\Form;

use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\apigee_m10n\Form\ReportsDownloadFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines the reports download form for team.
 */
class TeamReportsDownloadForm extends ReportsDownloadFormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, TeamInterface $team = NULL) {
    return $this->getForm($form, $form_state, $team);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntityId(): string {
    return $this->routeMatch->getParameter('team')->id();
  }

}
