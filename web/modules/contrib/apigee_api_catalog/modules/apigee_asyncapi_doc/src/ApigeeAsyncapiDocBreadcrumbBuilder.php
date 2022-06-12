<?php

namespace Drupal\apigee_asyncapi_doc;

use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Link;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\node\NodeInterface;

/**
 * Provides a breadcrumb builder for asyncapi_doc.
 */
class ApigeeAsyncapiDocBreadcrumbBuilder implements BreadcrumbBuilderInterface {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {
    $node = $route_match->getParameter('node');
    return $node instanceof NodeInterface && $node->getType() === 'asyncapi_doc';
  }

  /**
   * {@inheritdoc}
   */
  public function build(RouteMatchInterface $route_match) {
    $breadcrumb = new Breadcrumb();

    $links[] = Link::createFromRoute($this->t('Home'), '<front>');

    // API Catalog page is a view.
    $links[] = Link::createFromRoute($this->t('API Catalog'), 'view.apigee_api_catalog.page_1');

    $breadcrumb->setLinks($links);
    $breadcrumb->addCacheContexts(['route']);

    return $breadcrumb;
  }

}
