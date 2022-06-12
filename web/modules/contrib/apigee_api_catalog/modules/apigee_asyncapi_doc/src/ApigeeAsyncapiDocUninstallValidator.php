<?php

namespace Drupal\apigee_asyncapi_doc;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleUninstallValidatorInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;
use Drupal\Core\Url;
use Drupal\views\Views;

/**
 * Prevents uninstalling of module having content and reference in views.
 */
class ApigeeAsyncapiDocUninstallValidator implements ModuleUninstallValidatorInterface {

  use StringTranslationTrait;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new FilterUninstallValidator.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_manager
   *   The entity manager.
   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
   *   The string translation service.
   */
  public function __construct(EntityTypeManagerInterface $entity_manager, TranslationInterface $string_translation) {
    $this->entityTypeManager = $entity_manager;
    $this->stringTranslation = $string_translation;
  }

  /**
   * {@inheritdoc}
   */
  public function validate($module) {
    $reasons = [];
    if ($module == 'apigee_asyncapi_doc') {
      if ($this->hasAsyncApiDocNodes()) {
        $reasons[] = $this->t('To uninstall AsyncAPI for Apigee, first delete all <em>AsyncAPI Doc</em> content');
      }

      // Restrict uninstall, if reference of asyncapi_doc is there in apigee_api_catalog view.
      $is_views_references = FALSE;
      $view = Views::getView('apigee_api_catalog');
      if (is_object($view)) {
        $display = $view->getDisplay();

        $filters = $view->display_handler->getOption('filters');
        if (isset($filters['type']['value']['asyncapi_doc'])) {
          $is_views_references = TRUE;
        }
      }

      // Restrict uninstall, if reference of asyncapi_doc is there in api_catalog_admin view.
      $view = Views::getView('api_catalog_admin');
      if (is_object($view)) {
        $display = $view->getDisplay();

        $filters = $view->display_handler->getOption('filters');
        if (isset($filters['type']['value']['asyncapi_doc'])) {
          $is_views_references = TRUE;
        }
      }
      if ($is_views_references) {
        $message_arguments = [
          ':url' => Url::fromRoute('apigee_asyncapi_doc.confirm_remove_views_references')->toString(),
        ];
        $reasons[] = $this->t('<a href=":url">Click to remove AsyncAPI Doc references</a> from both "apigee_api_catalog" and "api_catalog_admin" views', $message_arguments);
      }
    }

    return $reasons;
  }

  /**
   * Determines if there are any asyncapi_doc nodes or not.
   *
   * @return bool
   *   TRUE if there are forum nodes, FALSE otherwise.
   */
  protected function hasAsyncApiDocNodes() {
    $nodes = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('type', 'asyncapi_doc')
      ->accessCheck(FALSE)
      ->range(0, 1)
      ->execute();
    return !empty($nodes);
  }

}
