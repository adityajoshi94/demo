<?php

namespace Drupal\apigee_edge\Event;

use Apigee\Edge\Api\Management\Entity\AppCredentialInterface;

/**
 * Triggered after an API product have been removed from an app credential.
 */
class AppCredentialDeleteApiProductEvent extends AbstractAppCredentialEvent {

  /**
   * Event id.
   *
   * @var string
   */
  const EVENT_NAME = 'apigee_edge.app_credential.delete_api_product';

  /**
   * Name of the API product that has been removed.
   *
   * @var string
   */
  private $apiProduct;

  /**
   * AppCredentialDeleteApiProductEvent constructor.
   *
   * @param string $app_type
   *   Either company or developer.
   * @param string $owner_id
   *   Company name or developer id (email) depending on the appType.
   * @param string $app_name
   *   Name of the app.
   * @param \Apigee\Edge\Api\Management\Entity\AppCredentialInterface $credential
   *   The app credential that has been created.
   * @param string $api_product
   *   Name of the API product that has been removed.
   */
  public function __construct(string $app_type, string $owner_id, string $app_name, AppCredentialInterface $credential, string $api_product) {
    parent::__construct($app_type, $owner_id, $app_name, $credential);
    $this->apiProduct = $api_product;
  }

  /**
   * Returns name of the API product that has been removed.
   *
   * @return string
   *   Name of the API product.
   */
  public function getApiProduct(): string {
    return $this->apiProduct;
  }

}
