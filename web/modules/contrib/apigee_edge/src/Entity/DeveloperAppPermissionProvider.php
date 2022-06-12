<?php

namespace Drupal\apigee_edge\Entity;

use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Permission provider for developer app entities.
 */
class DeveloperAppPermissionProvider extends EdgeEntityPermissionProviderBase {

  /**
   * {@inheritdoc}
   */
  protected function buildEntityTypePermissions(EntityTypeInterface $entity_type) {
    $permissions = parent::buildEntityTypePermissions($entity_type);
    $entity_type_id = $entity_type->id();

    $permissions["analytics any {$entity_type_id}"] = [
      'title' => $this->t('View any @type analytics', [
        '@type' => $entity_type->getSingularLabel(),
      ]),
    ];
    $permissions["analytics own {$entity_type_id}"] = [
      'title' => $this->t('View own @type analytics', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["add_api_key own {$entity_type_id}"] = [
      'title' => $this->t('Add API key to own @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["add_api_key any {$entity_type_id}"] = [
      'title' => $this->t('Add API key to any @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["revoke_api_key own {$entity_type_id}"] = [
      'title' => $this->t('Revoke API key from own @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["revoke_api_key any {$entity_type_id}"] = [
      'title' => $this->t('Revoke API key from any @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["delete_api_key own {$entity_type_id}"] = [
      'title' => $this->t('Delete API key from own @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["delete_api_key any {$entity_type_id}"] = [
      'title' => $this->t('Delete API key from any @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];
    $permissions["edit_api_products {$entity_type_id}"] = [
      'title' => $this->t('Edit API products for @type', [
        '@type' => $entity_type->getPluralLabel(),
      ]),
    ];

    return $permissions;
  }

}
