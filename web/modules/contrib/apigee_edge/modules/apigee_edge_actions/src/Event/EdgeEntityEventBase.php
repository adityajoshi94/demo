<?php

namespace Drupal\apigee_edge_actions\Event;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Base class for Edge events.
 *
 * @todo Rules does not support non GenericEvent context.
 */
abstract class EdgeEntityEventBase extends GenericEvent {

}
