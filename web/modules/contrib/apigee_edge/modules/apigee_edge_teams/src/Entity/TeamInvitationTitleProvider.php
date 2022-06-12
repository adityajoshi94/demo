<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\Controller\EntityController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Title provider for team_invitation.
 */
class TeamInvitationTitleProvider extends EntityController implements TeamInvitationTitleProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function acceptTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('Accept %label', ['%label' => $entity->label()]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function declineTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('Decline %label', ['%label' => $entity->label()]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function resendTitle(RouteMatchInterface $route_match, EntityInterface $_entity = NULL) {
    if ($entity = $this->doGetEntity($route_match, $_entity)) {
      return $this->t('Resend %label', ['%label' => $entity->label()]);
    }
  }

}
