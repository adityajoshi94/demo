<?php

namespace Drupal\apigee_edge\Entity\Form;

use Drupal\apigee_edge\Entity\ApiProductInterface;
use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;
use Drupal\apigee_edge\Entity\Controller\DeveloperAppCredentialControllerFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * General form handler for the developer app edit.
 */
class DeveloperAppEditForm extends AppEditForm {

  use DeveloperAppFormTrait;

  /**
   * The app credential controller factory.
   *
   * @var \Drupal\apigee_edge\Entity\Controller\DeveloperAppCredentialControllerFactoryInterface
   */
  protected $appCredentialControllerFactory;

  /**
   * Constructs DeveloperAppEditForm.
   *
   * @param \Drupal\apigee_edge\Entity\Controller\DeveloperAppCredentialControllerFactoryInterface $app_credential_controller_factory
   *   The developer app credential controller factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(DeveloperAppCredentialControllerFactoryInterface $app_credential_controller_factory, EntityTypeManagerInterface $entity_type_manager, RendererInterface $renderer) {
    parent::__construct($entity_type_manager, $renderer);
    $this->appCredentialControllerFactory = $app_credential_controller_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('apigee_edge.controller.developer_app_credential_factory'),
      $container->get('entity_type.manager'),
      $container->get('renderer')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function appCredentialController(string $owner, string $app_name): AppCredentialControllerInterface {
    return $this->appCredentialControllerFactory->developerAppCredentialController($owner, $app_name);
  }

  /**
   * {@inheritdoc}
   */
  protected function apiProductList(array $form, FormStateInterface $form_state): array {
    /** @var \Drupal\apigee_edge\Entity\DeveloperAppInterface $app */
    $app = $this->entity;

    // Sanity check, it could happen that the app owner (developer) does not
    // have a Drupal user.
    if ($app->getOwner() === NULL) {
      $context = [
        '%developer_id' => $app->getDeveloperId(),
      ];
      $this->messenger()->addError($this->t('Unable to apply API product access because the owner of the app (%developer_id) does not have a user in system.', $context));
      $this->logger('apigee_edge')->critical('Unable to apply API product access because the owner of the app (%developer_id) does not have a user in system.', $context);
      return [];
    }

    // Here because we know the owner (developer) of the app and it can not
    // be changed we can limit the visible API products.
    return array_filter($this->entityTypeManager->getStorage('api_product')->loadMultiple(), function (ApiProductInterface $product) use ($app) {
      return $product->access('assign', $app->getOwner());
    });
  }

}
