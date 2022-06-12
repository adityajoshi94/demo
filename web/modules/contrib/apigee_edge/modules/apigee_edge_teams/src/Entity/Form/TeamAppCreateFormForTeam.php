<?php

namespace Drupal\apigee_edge_teams\Entity\Form;

use Drupal\apigee_edge_teams\Entity\TeamInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Team app create form for a team.
 */
class TeamAppCreateFormForTeam extends TeamAppCreateFormBase {

  /**
   * The team from the route.
   *
   * @var \Drupal\apigee_edge_teams\Entity\TeamInterface
   */
  protected $team;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, TeamInterface $team = NULL) {
    // This is the only place where we can grab additional route parameters.
    // See implementation in parent.
    $this->team = $team;
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function alterFormBeforeApiProductElement(array &$form, FormStateInterface $form_state): void {
    // The user from the route is the owner.
    $form['owner'] = [
      '#type' => 'value',
      '#value' => $this->team->id(),
    ];
  }

}
