<?php

namespace Drupal\apigee_edge\Exception;

use Drupal\Core\Field\FieldException;

/**
 * Decorator around Drupal's FieldException.
 */
class EdgeFieldException extends FieldException implements ApigeeEdgeExceptionInterface {

}
