<?php

namespace Drupal\apigee_edge_teams;

/**
 * Base definition of the company members controller factory service.
 */
interface CompanyMembersControllerFactoryInterface {

  /**
   * Returns a preconfigured company members controller.
   *
   * @param string $company
   *   Name of a company.
   *
   * @return \Drupal\apigee_edge_teams\CompanyMembersControllerInterface
   *   The preconfigured company members control of the company.
   */
  public function companyMembersController(string $company): CompanyMembersControllerInterface;

}
