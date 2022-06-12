<?php

namespace Drupal\apigee_edge;

use Symfony\Component\Console\Style\StyleInterface;

/**
 * Defines an interface for CLI service classes.
 */
interface CliServiceInterface {

  /**
   * Handle the sync interaction.
   *
   * @param \Symfony\Component\Console\Style\StyleInterface $io
   *   The IO interface of the CLI tool calling the method.
   * @param callable $t
   *   The translation function akin to t().
   */
  public function sync(StyleInterface $io, callable $t);

  /**
   * Create an Apigee role for Drupal use.
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
   * @param string|null $base_url
   *   The base url of the Edge API.
   * @param string|null $role_name
   *   The role name to add the permissions to.
   * @param bool|null $force
   *   Force permissions to be set even if role exists.
   */
  public function createEdgeRoleForDrupal(
    StyleInterface $io,
    callable $t,
    string $org,
    string $email,
    string $password,
    ?string $base_url,
    ?string $role_name,
    ?bool $force
  );

}
