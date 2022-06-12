<?php

namespace Drupal\apigee_edge_teams\Entity\ListBuilder;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * List builder handler for team_invitation.
 */
class TeamInvitationListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function getDefaultOperations(EntityInterface $entity) {
    /** @var \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface $entity */
    $operations = parent::getDefaultOperations($entity);

    if ($entity->isPending() && $entity->access('accept') && $entity->hasLinkTemplate('accept-form')) {
      $operations['accept'] = [
        'title' => $this->t('Accept'),
        'weight' => 100,
        'url' => $this->ensureDestination($entity->toUrl('accept-form'))->setRouteParameter('team', $entity->getTeam()->id()),
      ];
    }

    if ($entity->isPending() && $entity->access('decline') && $entity->hasLinkTemplate('decline-form')) {
      $operations['decline'] = [
        'title' => $this->t('Decline'),
        'weight' => 100,
        'url' => $this->ensureDestination($entity->toUrl('decline-form'))->setRouteParameter('team', $entity->getTeam()->id()),
      ];
    }

    if ($entity->access('resend') && $entity->hasLinkTemplate('resend-form')) {
      $operations['resend'] = [
        'title' => $this->t('Resend'),
        'weight' => 100,
        'url' => $this->ensureDestination($entity->toUrl('resend-form'))->setRouteParameter('team', $entity->getTeam()->id()),
      ];
    }

    /** @var \Drupal\apigee_edge_teams\Entity\TeamInvitationInterface $entity */
    if ($entity->access('delete') && $entity->hasLinkTemplate('delete-form')) {
      $operations['delete'] = [
        'title' => $this->t('Revoke'),
        'weight' => 100,
        'url' => $this->ensureDestination($entity->toUrl('delete-form'))->setRouteParameter('team', $entity->getTeam()->id()),
      ];
    }

    return $operations;
  }

}
