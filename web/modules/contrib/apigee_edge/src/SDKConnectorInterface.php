<?php

namespace Drupal\apigee_edge;

use Apigee\Edge\ClientInterface;
use Drupal\key\KeyInterface;
use Http\Message\Authentication;

/**
 * Defines an interface for SDK controller classes.
 */
interface SDKConnectorInterface {

  /**
   * Gets the organization.
   *
   * @return string
   *   The organization.
   */
  public function getOrganization(): string;

  /**
   * Returns the http client.
   *
   * @return \Apigee\Edge\ClientInterface
   *   The http client.
   */
  public function getClient(): ClientInterface;

  /**
   * Test connection with the Edge Management Server.
   *
   * @param \Drupal\key\KeyInterface|null $key
   *   Key entity to check connection with Edge,
   *   if NULL, then use the stored key.
   *
   * @throws \Exception
   */
  public function testConnection(KeyInterface $key = NULL);

  /**
   * Returns a pre-configured API client with the provided credentials.
   *
   * @param \Http\Message\Authentication $authentication
   *   Authentication.
   * @param null|string $endpoint
   *   API endpoint, default is https://api.enterprise.apigee.com/v1.
   * @param array $options
   *   Client configuration option.
   *
   * @return \Apigee\Edge\ClientInterface
   *   Configured API client.
   */
  public function buildClient(Authentication $authentication, ?string $endpoint = NULL, array $options = []): ClientInterface;

}
