<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Form\EdgeEntityAliasConfigFormBase;

/**
 * Provides a form for changing Team app aliases.
 */
class TeamAppAliasForm extends EdgeEntityAliasConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'apigee_edge_teams_team_app_alias_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'apigee_edge_teams.team_app_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function entityTypeName(): string {
    return $this->t('Team App');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalSingularLabel(): string {
    return $this->t('Team App');
  }

  /**
   * {@inheritdoc}
   */
  protected function originalPluralLabel(): string {
    return $this->t('Team Apps');
  }

}
