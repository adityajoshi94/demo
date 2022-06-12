<?php

namespace Drupal\apigee_edge\Plugin\Field\FieldType;

use Drupal\Core\Field\Plugin\Field\FieldType\UriItem;

/**
 * App callback url specific plugin implementation of a URI item.
 *
 * This field is hidden on the Field UI, because it should be used as a base
 * field only on company- and developer app entities.
 *
 * @FieldType(
 *   id = "app_callback_url",
 *   label = @Translation("App Callback URL"),
 *   description = @Translation("An entity field containing a callback url for an app."),
 *   no_ui = TRUE,
 *   default_formatter = "uri_link",
 *   default_widget = "app_callback_url",
 * )
 */
class AppCallbackUrlItem extends UriItem {

}
