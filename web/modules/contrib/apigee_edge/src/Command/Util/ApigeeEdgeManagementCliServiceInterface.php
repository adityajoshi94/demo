<?php

namespace Drupal\apigee_edge\Command\Util;

use Symfony\Component\Console\Style\StyleInterface;

/**
 * Defines an interface for Edge connection classes.
 */
interface ApigeeEdgeManagementCliServiceInterface {

  // Default role name to create in Apigee Edge.
  const DEFAULT_ROLE_NAME = 'drupalportal';

  /**
   * Create role in Apigee Edge for Drupal to use for Edge connection.
   *
   * @param \Symfony\Component\Console\Style\StyleInterface $io
   *   The IO interface of the CLI tool calling the method.
   * @param callable $t
   *   The translation function akin to t().
   * @param string $org
   *   The organization to connect to.
   * @param string $email
   *   The email of an Edge user with org admin role to make Edge API calls.
   * @param string $password
   *   The password of an Edge user with org admin role to make Edge API calls.
   * @param null|string $base_url
   *   The base url of the Edge API.
   * @param null|string $role_name
   *   The role name to add the permissions to.
   * @param null|bool $force
   *   Force running of permissions on a role that already exists.
   */
  public function createEdgeRoleForDrupal(
    StyleInterface $io,
    callable $t,
    string $org,
    string $email,
    string $password,
    ?string $base_url,
    ?string $role_name,
    bool $force
  );

}
