<?php

namespace Drupal\apigee_edge\ParamConverter;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\ParamConverter\ParamConverterInterface;
use Symfony\Component\Routing\Route;

/**
 * Resolves "developer_with_user" type parameters in routes.
 *
 * Use this parameter converter instead of paramconverter.entity if you would
 * like to ensure that a developer (by UUID or email address) from Apigee Edge
 * has a user in Drupal.
 */
final class DeveloperWithUser implements ParamConverterInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * DeveloperWithUser constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    /** @var \Drupal\apigee_edge\Entity\DeveloperInterface|null $developer */
    $developer = $this->entityTypeManager->getStorage('developer')->load($value);

    if ($developer) {
      return $developer->getOwner() ? $developer : NULL;
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route) {
    return (!empty($definition['type']) && $definition['type'] == 'developer_with_user');
  }

}
