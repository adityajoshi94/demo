<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider;
use Symfony\Component\Routing\Route;

/**
 * Provides entity routes for team_invitation.
 */
class TeamInvitationRouteProvider extends DefaultHtmlRouteProvider {

  use TeamRoutingHelperTrait;

  /**
   * {@inheritdoc}
   */
  public function getRoutes(EntityTypeInterface $entity_type) {
    $collection = parent::getRoutes($entity_type);
    $entity_type_id = $entity_type->id();

    if ($delete_form = $this->getDeleteFormRoute($entity_type)) {
      $collection->add("entity.{$entity_type_id}.delete_form", $delete_form);
    }

    if ($accept_form = $this->getAcceptFormRoute($entity_type)) {
      $collection->add("entity.{$entity_type_id}.accept_form", $accept_form);
    }

    if ($decline_form = $this->getDeclineFormRoute($entity_type)) {
      $collection->add("entity.{$entity_type_id}.decline_form", $decline_form);
    }

    if ($resend_form = $this->getResentFormRoute($entity_type)) {
      $collection->add("entity.{$entity_type_id}.resend_form", $resend_form);
    }

    return $collection;
  }

  /**
   * Gets the delete-form route for team_invitation.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getDeleteFormRoute(EntityTypeInterface $entity_type) {
    if ($entity_type->hasLinkTemplate('delete-form')) {
      $entity_type_id = $entity_type->id();
      $route = new Route($entity_type->getLinkTemplate('delete-form'));
      $route->setDefault('_entity_form', "{$entity_type_id}.delete");
      $route->setDefault('_title_callback', TeamInvitationTitleProvider::class . '::deleteTitle');
      $route->setDefault('entity_type_id', $entity_type_id);
      $this->ensureTeamParameter($route);
      $route->setRequirement('_entity_access', "{$entity_type_id}.delete");
      return $route;
    }
  }

  /**
   * Gets the notify-form route for team_invitation.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getResentFormRoute(EntityTypeInterface $entity_type) {
    if ($entity_type->hasLinkTemplate('resend-form')) {
      $entity_type_id = $entity_type->id();
      $route = new Route($entity_type->getLinkTemplate('resend-form'));
      $route->setDefault('_entity_form', "{$entity_type_id}.resend");
      $route->setDefault('_title_callback', TeamInvitationTitleProvider::class . '::resendTitle');
      $route->setDefault('entity_type_id', $entity_type_id);
      $this->ensureTeamParameter($route);
      $route->setRequirement('_entity_access', "{$entity_type_id}.resend");
      return $route;
    }
  }

  /**
   * Gets the accept-form route for team_invitation.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getAcceptFormRoute(EntityTypeInterface $entity_type) {
    if ($entity_type->hasLinkTemplate('accept-form')) {
      $entity_type_id = $entity_type->id();
      $route = new Route($entity_type->getLinkTemplate('accept-form'));
      $route->setDefault('_entity_form', "{$entity_type_id}.accept");
      $route->setDefault('_title_callback', TeamInvitationTitleProvider::class . '::acceptTitle');
      $route->setDefault('entity_type_id', $entity_type_id);
      $this->ensureTeamParameter($route);
      $route->setRequirement('_entity_access', "{$entity_type_id}.accept");
      return $route;
    }
  }

  /**
   * Gets the decline-form route for team_invitation.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getDeclineFormRoute(EntityTypeInterface $entity_type) {
    if ($entity_type->hasLinkTemplate('decline-form')) {
      $entity_type_id = $entity_type->id();
      $route = new Route($entity_type->getLinkTemplate('decline-form'));
      $route->setDefault('_entity_form', "{$entity_type_id}.decline");
      $route->setDefault('_title_callback', TeamInvitationTitleProvider::class . '::declineTitle');
      $route->setDefault('entity_type_id', $entity_type_id);
      $this->ensureTeamParameter($route);
      $route->setRequirement('_entity_access', "{$entity_type_id}.decline");
      return $route;
    }
  }

}
