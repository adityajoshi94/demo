<?php

namespace Drupal\apigee_edge\Form;

use Apigee\Edge\Api\Management\Entity\AppCredential;
use Drupal\apigee_edge\Entity\AppInterface;
use Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides a base confirmation form for app API key.
 */
abstract class AppApiKeyConfirmFormBase extends ConfirmFormBase {

  /**
   * The app entity.
   *
   * @var \Drupal\apigee_edge\Entity\AppInterface
   */
  protected $app;

  /**
   * The consumer key.
   *
   * @var string
   */
  protected $consumerKey;

  /**
   * Returns the app credential controller.
   *
   * @param string $owner
   *   The developer id (UUID), email address or team (company) name.
   * @param string $app_name
   *   The name of an app.
   *
   * @return \Drupal\apigee_edge\Entity\Controller\AppCredentialControllerInterface
   *   The app credential controller.
   */
  abstract protected function appCredentialController(string $owner, string $app_name) : AppCredentialControllerInterface;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ?AppInterface $app = NULL, ?string $consumer_key = NULL) {
    // Validate consumer key in app credentials.
    if (!in_array($consumer_key, array_map(function (AppCredential $app_credential) {
      return $app_credential->getConsumerKey();
    }, $app->getCredentials()))) {
      throw new NotFoundHttpException();
    }

    $this->app = $app;
    $this->consumerKey = $consumer_key;
    return parent::buildForm($form, $form_state);
  }

}
