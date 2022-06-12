<?php

namespace Drupal\apigee_edge\Event;

/**
 * Triggered when a new credential has been generated or for an app.
 *
 * When a new app key has been _generated_ you can access API products on the
 * credential.
 */
class AppCredentialGenerateEvent extends AbstractAppCredentialEvent {

  /**
   * Event id.
   *
   * @var string
   */
  const EVENT_NAME = 'apigee_edge.app_credential.generate';

}
