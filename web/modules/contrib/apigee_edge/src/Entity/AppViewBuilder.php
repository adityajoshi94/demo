<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Render\Element;
use Drupal\Core\Url;

/**
 * Common app view builder for developer- and company (team) apps.
 */
class AppViewBuilder extends EdgeEntityViewBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildMultiple(array $build_list) {
    $results = parent::buildMultiple($build_list);
    foreach (Element::children($results) as $key) {
      /** @var \Drupal\apigee_edge\Entity\AppInterface $app */
      $app = $results[$key]["#{$this->entityTypeId}"];
      // If the callback field is visible, display an error message if the
      // callback url field value does not contain a valid URI.
      if (array_key_exists('callbackUrl', $results[$key]) && !empty($app->getCallbackUrl()) && $app->getCallbackUrl() !== $app->get('callbackUrl')->value) {
        try {
          Url::fromUri($app->getCallbackUrl());
        }
        catch (\Exception $exception) {
          $results[$key]['callback_url_error'] = [
            '#theme' => 'status_messages',
            '#message_list' => [
              'warning' => [$this->t('The @field value should be fixed. @message', [
                '@field' => $app->getFieldDefinition('callbackUrl')->getLabel(),
                '@message' => $exception->getMessage(),
              ]),
              ],
            ],
              // Display it on the top of the view.
            '#weight' => -100,
          ];
        }
      }
    }
    return $results;
  }

}
