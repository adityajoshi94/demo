<?php

namespace Drupal\apigee_edge_teams\Entity;

use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\entity\EntityPermissionProviderInterface;

/**
 * Permission provider for Team App entities.
 */
final class TeamAppPermissionProvider implements EntityPermissionProviderInterface {

  use StringTranslationTrait;

  /**
   * The id of the Manage Team Apps permission.
   *
   * @var string
   */
  public const MANAGE_TEAM_APPS_PERMISSION = 'manage team apps';

  /**
   * {@inheritdoc}
   */
  public function buildPermissions(EntityTypeInterface $entity_type) {
    $permissions = [];

    $team_app_plural_label = $entity_type->getPluralLabel();

    $permissions[static::MANAGE_TEAM_APPS_PERMISSION] = [
      'title' => $this->t('Manage @type', [
        '@type' => $team_app_plural_label,
      ]),
      'description' => $this->t('Allows to manage all @team_apps in the system.', [
        '@team_apps' => $team_app_plural_label,
      ]),
      'restrict access' => TRUE,
    ];

    foreach ($permissions as $name => $permission) {
      $permissions[$name]['provider'] = $entity_type->getProvider();
      // TranslatableMarkup objects don't sort properly.
      $permissions[$name]['title'] = (string) $permission['title'];
    }

    return $permissions;
  }

}
