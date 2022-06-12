<?php

namespace Drupal\apigee_edge_teams\Form;

use Drupal\apigee_edge\Form\AppApiKeyRevokeFormBase;

/**
 * Provides revoke confirmation form for team app API key.
 */
class TeamAppApiKeyRevokeForm extends AppApiKeyRevokeFormBase {

  use TeamAppApiKeyFormTrait;

}
