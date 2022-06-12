<?php

namespace Drupal\apigee_m10n_add_credit\Plugin\EntityReferenceSelection;

use Drupal\apigee_m10n_add_credit\AddCreditConfig;
use Drupal\Core\Entity\Plugin\EntityReferenceSelection\DefaultSelection;

/**
 * Provides a entity selection plugin for add credit products.
 *
 * @EntityReferenceSelection(
 *   id = "apigee_m10n_add_credit:products",
 *   label = @Translation("Add credit products selection"),
 *   entity_types = {"commerce_product"},
 *   group = "apigee_m10n_add_credit",
 *   weight = 1
 * )
 */
class AddCreditProductsSelection extends DefaultSelection {

  /**
   * {@inheritdoc}
   */
  protected function buildEntityQuery($match = NULL, $match_operator = 'CONTAINS') {
    $query = parent::buildEntityQuery($match, $match_operator);

    // Filter add credit enabled products only.
    $query->condition(AddCreditConfig::ADD_CREDIT_ENABLED_FIELD_NAME, TRUE);

    return $query;
  }

}
