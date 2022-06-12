<?php

namespace Drupal\apigee_edge_teams\Plugin\views\filter;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;
use Drupal\views\Plugin\views\filter\InOperator;

/**
 * Providers filtering for team_invitation status.
 *
 * @ViewsFilter("team_invitation_status")
 */
class TeamInvitationStatusFilter extends InOperator {

  /**
   * {@inheritdoc}
   */
  public function getValueOptions() {
    $this->valueOptions = [
      TeamInvitationInterface::STATUS_PENDING => $this->t('Pending'),
      TeamInvitationInterface::STATUS_ACCEPTED => $this->t('Accepted'),
      TeamInvitationInterface::STATUS_DECLINED => $this->t('Declined'),
      TeamInvitationInterface::STATUS_EXPIRED => $this->t('Expired'),
    ];

    return $this->valueOptions;
  }

}
