<?php

namespace Drupal\apigee_edge\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a controller for the configurable error page.
 */
class ErrorPageController extends ControllerBase {

  /**
   * ErrorPageController constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory object.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * Builds the renderable array for page.html.twig using the module's config.
   *
   * @return array
   *   The renderable array.
   */
  public function render(): array {
    $build['content'] = [
      '#type' => 'processed_text',
      '#format' => $this->configFactory->get('apigee_edge.error_page')->get('error_page_content.format'),
      '#text' => $this->configFactory->get('apigee_edge.error_page')->get('error_page_content.value'),
    ];
    return $build;
  }

  /**
   * Returns the error page title from the module's config.
   *
   * @return string
   *   The page title.
   */
  public function getPageTitle(): string {
    return $this->configFactory->get('apigee_edge.error_page')->get('error_page_title');
  }

}
