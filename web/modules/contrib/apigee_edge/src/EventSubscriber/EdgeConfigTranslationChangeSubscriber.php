<?php

namespace Drupal\apigee_edge\EventSubscriber;

use Drupal\language\Config\LanguageConfigOverrideCrudEvent;
use Drupal\language\Config\LanguageConfigOverrideEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Clears caches when an Apigee Edge related config translation gets updated.
 *
 * The primary purpose of this subscriber is to clear all caches when Apigee
 * Edge custom entity labels gets translated via config objects.
 */
final class EdgeConfigTranslationChangeSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    if (class_exists('\Drupal\language\Config\LanguageConfigOverrideEvents')) {
      return [
        LanguageConfigOverrideEvents::SAVE_OVERRIDE => 'clearCache',
        LanguageConfigOverrideEvents::DELETE_OVERRIDE => 'clearCache',
      ];
    }
    return [];
  }

  /**
   * Clears caches when an Edge entity type's config translation gets updated.
   *
   * @param \Drupal\language\Config\LanguageConfigOverrideCrudEvent $event
   *   The event object.
   */
  public function clearCache(LanguageConfigOverrideCrudEvent $event) {
    /** @var \Drupal\language\Config\LanguageConfigOverride $override */
    $override = $event->getLanguageConfigOverride();
    if (preg_match('/^apigee_edge/', $override->getName())) {
      // It is easier to do that rather than just trying to figure our all
      // cache bins and tags that requires invalidation. We tried that.
      drupal_flush_all_caches();
    }
  }

}
