<?php

namespace Drupal\apigee_edge\Event;

use Apigee\Edge\Api\Management\Entity\AppCredentialInterface;

/**
 * Triggered when new API products have been added to an app credential.
 */
class AppCredentialAddApiProductEvent extends AbstractAppCredentialEvent {

  /**
   * Event id.
   *
   * @var string
   */
  const EVENT_NAME = 'apigee_edge.app_credential.add_api_product';

  /**
   * Array of recently added API product names.
   *
   * @var string[]
   */
  private $newProducts;

  /**
   * AppCredentialAddApiProductEvent constructor.
   *
   * @param string $app_type
   *   Either company or developer.
   * @param string $owner_id
   *   Company name or developer id (email) depending on the appType.
   * @param string $app_name
   *   Name of the app.
   * @param \Apigee\Edge\Api\Management\Entity\AppCredentialInterface $credential
   *   The app credential that has been created.
   * @param array $new_products
   *   Array of API product names that has just been added to the key.
   */
  public function __construct(string $app_type, string $owner_id, string $app_name, AppCredentialInterface $credential, array $new_products) {
    parent::__construct($app_type, $owner_id, $app_name, $credential);
    $this->newProducts = $new_products;
  }

  /**
   * Returns new API products added to the credential.
   *
   * @return string[]
   *   Array of API product names.
   */
  public function getNewProducts(): array {
    return $this->newProducts;
  }

}
