<?php

namespace Drupal\apigee_edge\Event;

/**
 * Triggered when a new app credential has been created for an app.
 *
 * When app key has been _created_ then you can not access to API products
 * on the credential yet because are going to be assigned later.
 */
class AppCredentialCreateEvent extends AbstractAppCredentialEvent {

  /**
   * Event id.
   *
   * @var string
   */
  const EVENT_NAME = 'apigee_edge.app_credential.create';

}
