<?php

namespace Drupal\apigee_edge_teams;

use Apigee\Edge\Api\Management\Structure\CompanyMembership;

/**
 * Company membership object cache definition.
 */
interface CompanyMembershipObjectCacheInterface {

  /**
   * Saves company membership object to the cache.
   *
   * @param string $company
   *   Name of a company.
   * @param \Apigee\Edge\Api\Management\Structure\CompanyMembership $membership
   *   Membership object with the members.
   */
  public function saveMembership(string $company, CompanyMembership $membership): void;

  /**
   * Removes company membership object from the cache.
   *
   * @param string $company
   *   Name of a company.
   */
  public function removeMembership(string $company): void;

  /**
   * Invalidate membership objects by tags.
   *
   * @param array $tags
   *   Array of cache tags.
   */
  public function invalidateMemberships(array $tags): void;

  /**
   * Returns membership object from the cache.
   *
   * @param string $company
   *   Name of a company.
   *
   * @return \Apigee\Edge\Api\Management\Structure\CompanyMembership|null
   *   Membership object with the members or null if no entry found for the
   *   given company in the cache.
   */
  public function getMembership(string $company): ?CompanyMembership;

}
