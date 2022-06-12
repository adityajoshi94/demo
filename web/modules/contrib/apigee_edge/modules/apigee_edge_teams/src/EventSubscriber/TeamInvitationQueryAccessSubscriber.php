<?php

namespace Drupal\apigee_edge_teams\EventSubscriber;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\entity\QueryAccess\QueryAccessEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Subscribes to query access events for team_invitation.
 */
class TeamInvitationQueryAccessSubscriber implements EventSubscriberInterface {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * TeamInvitationQueryAccessSubscriber constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      'entity.query_access.team_invitation' => 'onQueryAccess',
    ];
  }

  /**
   * Modifies the access conditions for team_invitation.
   *
   * @param \Drupal\entity\QueryAccess\QueryAccessEvent $event
   *   The event.
   */
  public function onQueryAccess(QueryAccessEvent $event) {
    // Add a condition to check for a valid team.
    // We query team from storage instead of check for a null team field because
    // the team might have been deleted on the remote server.
    $team_ids = array_keys($this->entityTypeManager->getStorage('team')->loadMultiple());
    if ($team_ids) {
      $event->getConditions()->addCondition('team', $team_ids);
    }
    else {
      // When no teams could be loaded from the storage, no invitation should be
      // returned at all.
      $event->getConditions()->alwaysFalse();
    }
  }

}
