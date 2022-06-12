<?php

namespace Drupal\apigee_edge\Event;

/**
 * Triggered when an app credential gets deleted.
 */
class AppCredentialDeleteEvent extends AbstractAppCredentialEvent {

  /**
   * Event id.
   *
   * @var string
   */
  const EVENT_NAME = 'apigee_edge.app_credential.delete';

}
