<?php

namespace Drupal\apigee_edge_teams\Controller;

use Drupal\apigee_edge\Controller\DeveloperAppKeysController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for the team app credentials.
 */
class TeamAppKeysController extends DeveloperAppKeysController {

  /**
   * Returns app credentials.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The app credentials.
   */
  public function teamAppKeys($team, $app): JsonResponse {
    $payload = [];
    if ($team) {
      $app_storage = $this->entityTypeManager->getStorage('team_app');
      $app_ids = $app_storage->getQuery()
        ->condition('companyName', $team->id())
        ->condition('name', $app->getName())
        ->execute();
      if (!empty($app_ids)) {
        $app_id = reset($app_ids);
        $payload = $this->getAppKeys($app_storage->load($app_id));
      }
    }
    return new JsonResponse($payload, 200, ['Cache-Control' => 'must-understand, no-store']);
  }

}
