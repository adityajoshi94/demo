<?php

namespace Drupal\apigee_api_catalog\Entity\Routing;

use Drupal\apigee_api_catalog\Controller\ApiDocController;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\Routing\AdminHtmlRouteProvider;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\Routing\Route;

/**
 * Provides routes for API Doc entities.
 *
 * @deprecated in 2.x and is removed from 3.x. Use the node "apidoc" bundle instead.
 * @see \Drupal\Core\Entity\Routing\AdminHtmlRouteProvider
 * @see \Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider
 */
class ApiDocHtmlRouteProvider extends AdminHtmlRouteProvider {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function getRoutes(EntityTypeInterface $entity_type) {
    $collection = parent::getRoutes($entity_type);

    if ($settings_form_route = $this->getSettingsFormRoute($entity_type)) {
      $collection->add('entity.apidoc.settings', $settings_form_route);
    }

    if ($apidoc_collection_route = $collection->get('entity.apidoc.collection')) {
      $apidoc_collection_route->setDefault('_title', $this->t('@entity_type catalog', ['@entity_type' => $entity_type->getLabel()])->render());
    }

    if ($reimport_spec_route = $this->getReimportSpecFormRoute($entity_type)) {
      $collection->add("entity.apidoc.reimport_spec_form", $reimport_spec_route);
    }

    return $collection;
  }

  /**
   * Gets the settings form route.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getSettingsFormRoute(EntityTypeInterface $entity_type) {
    if (!$entity_type->getBundleEntityType()) {
      $route = new Route('admin/structure/apidoc');
      $route
        ->setDefaults([
          '_form' => 'Drupal\apigee_api_catalog\Entity\Form\ApiDocSettingsForm',
          '_title_callback' => ApiDocController::class . '::title',
        ])
        ->setRequirement('_permission', $entity_type->getAdminPermission())
        ->setOption('_admin_route', TRUE);

      return $route;
    }
  }

  /**
   * Gets the reimport-spec-form route.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type.
   *
   * @return \Symfony\Component\Routing\Route|null
   *   The generated route, if available.
   */
  protected function getReimportSpecFormRoute(EntityTypeInterface $entity_type) {
    $route = new Route($entity_type->getLinkTemplate('reimport-spec-form'));

    $route
      ->setDefaults([
        '_entity_form' => "apidoc.reimport_spec",
        '_title' => 'Re-import API Doc OpenAPI specification',
      ])
      ->setRequirement('_entity_access', "apidoc.reimport")
      ->setOption('parameters', [
        'apidoc' => ['type' => 'entity:apidoc'],
      ]);

    // Entity types with serial IDs can specify this in their route
    // requirements, improving the matching process.
    if ($this->getEntityTypeIdKeyType($entity_type) === 'integer') {
      $route->setRequirement('apidoc', '\d+');
    }

    return $route;
  }

}
