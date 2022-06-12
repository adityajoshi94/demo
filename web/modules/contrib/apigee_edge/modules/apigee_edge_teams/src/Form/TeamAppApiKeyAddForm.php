<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Form\AppApiKeyAddFormBase;
use Drupal\apigee_edge_teams\Entity\Form\TeamAppFormTrait;
use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides API key add form for team app.
 */
class TeamAppApiKeyAddForm extends AppApiKeyAddFormBase {

  use TeamAppFormTrait, TeamAppApiKeyFormTrait;

  /**
   * The team from route.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInterface
   */
  protected $team;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ?AppInterface $app = NULL, ?TeamInterface $team = NULL) {
    $this->team = $team;
    return parent::buildForm($form, $form_state, $app);
  }

  /**
   * {@inheritdoc}
   */
  protected function getRedirectUrl(): Url {
    return $this->getCancelUrl();
  }

  /**
   * {@inheritdoc}
   */
  protected function getAppOwner(): string {
    return $this->team->id();
  }

}
