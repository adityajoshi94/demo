<?php

namespace Drupal\apigee_edge_teams;

use Apigee\Edge\Api\Management\Controller\CompanyMembersController as EdgeCompanyMembersController;
use Apigee\Edge\Api\Management\Structure\CompanyMembership;
use Drupal\apigee_edge\SDKConnectorInterface;

/**
 * Definition of the Company members controller service.
 *
 * @internal You should use the team membership manager service instead of this.
 */
final class CompanyMembersController implements CompanyMembersControllerInterface {

  /**
   * Name of a company.
   *
   * @var string
   */
  private $company;

  /**
   * The SDK connector service.
   *
   * @var \Drupal\apigee_edge\SDKConnectorInterface
   */
  private $connector;

  /**
   * The company membership object cache.
   *
   * @var \Drupal\apigee_edge_teams\CompanyMembershipObjectCacheInterface
   */
  private $companyMembershipObjectCache;

  /**
   * CompanyMembersController constructor.
   *
   * @param string $company
   *   The name of the company.
   * @param \Drupal\apigee_edge\SDKConnectorInterface $connector
   *   The SDK connector service.
   * @param \Drupal\apigee_edge_teams\CompanyMembershipObjectCacheInterface $company_membership_object_cache
   *   The company membership object cache.
   */
  public function __construct(string $company, SDKConnectorInterface $connector, CompanyMembershipObjectCacheInterface $company_membership_object_cache) {
    $this->company = $company;
    $this->connector = $connector;
    $this->companyMembershipObjectCache = $company_membership_object_cache;
  }

  /**
   * Returns the decorated company members controller from the SDK.
   *
   * @return \Apigee\Edge\Api\Management\Controller\CompanyMembersController
   *   The initialized company members controller.
   */
  private function decorated(): EdgeCompanyMembersController {
    return new EdgeCompanyMembersController($this->company, $this->connector->getOrganization(), $this->connector->getClient());
  }

  /**
   * {@inheritdoc}
   */
  public function getCompanyName(): string {
    return $this->decorated()->getCompanyName();
  }

  /**
   * {@inheritdoc}
   */
  public function getMembers(): CompanyMembership {
    $membership = $this->companyMembershipObjectCache->getMembership($this->company);
    if ($membership === NULL) {
      $membership = $this->decorated()->getMembers();
      $this->companyMembershipObjectCache->saveMembership($this->company, $membership);
    }

    return $membership;
  }

  /**
   * {@inheritdoc}
   */
  public function setMembers(CompanyMembership $members): CompanyMembership {
    $result = $this->decorated()->setMembers($members);
    // Returned membership does not contain all actual members of the company,
    // so it is easier to remove the membership object from the cache and
    // enforce reload in getMembers().
    $this->companyMembershipObjectCache->removeMembership($this->company);
    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function removeMember(string $email): void {
    $this->decorated()->removeMember($email);
    $this->companyMembershipObjectCache->removeMembership($this->company);
  }

}
