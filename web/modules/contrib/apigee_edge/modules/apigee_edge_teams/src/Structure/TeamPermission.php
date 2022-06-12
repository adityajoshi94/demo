<?php

namespace Drupal\apigee_edge_teams\Structure;

use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Describes a team permission.
 */
final class TeamPermission {

  /**
   * The name of the team permission.
   *
   * @var string
   */
  private $name;

  /**
   * The human readable name of the team permission.
   *
   * @var \Drupal\Core\StringTranslation\TranslatableMarkup
   */
  private $label;

  /**
   * The optional description of the team permission.
   *
   * @var \Drupal\Core\StringTranslation\TranslatableMarkup|null
   */
  private $description;

  /**
   * The category of the team permission.
   *
   * @var \Drupal\Core\StringTranslation\TranslatableMarkup
   */
  private $category;

  /**
   * TeamPermission constructor.
   *
   * @param string $name
   *   The unique machine name of the team permission.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $label
   *   The human-readable name of the team permission, to be shown on the
   *   team permission administration page.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $category
   *   The category that the team permission belongs (ex.: "Team Apps", the
   *   name of the provider module, etc.), to be shown on the team permission
   *   administration page.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|null $description
   *   A description of what the team permission does, to be shown on the team
   *   permission administration page.
   */
  public function __construct(string $name, TranslatableMarkup $label, TranslatableMarkup $category, ?TranslatableMarkup $description = NULL) {
    $this->name = $name;
    $this->label = $label;
    $this->description = $description;
    $this->category = $category;
  }

  /**
   * Returns the unique machine name of the team permission.
   *
   * @return string
   *   The name of the permission.
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * Returns the human readable name of the team permission.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   The human readable name of the permission.
   */
  public function getLabel(): TranslatableMarkup {
    return $this->label;
  }

  /**
   * Returns the description of the team permission.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup|null
   *   The description of the permission, or NULL.
   */
  public function getDescription(): ?TranslatableMarkup {
    return $this->description;
  }

  /**
   * Returns the category of the team permission.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   The category of the team permission.
   */
  public function getCategory(): TranslatableMarkup {
    return $this->category;
  }

}
