<?php

namespace Drupal\apigee_api_catalog\Plugin\Validation\Constraint;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class ApiDocFileLinkConstraintValidator.
 */
class ApiDocFileLinkConstraintValidator extends ConstraintValidator implements ContainerInjectionInterface {

  /**
   * The HTTP client to fetch the files with.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * ApiDocFileLinkConstraintValidator constructor.
   *
   * @param \GuzzleHttp\ClientInterface $http_client
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('http_client'));
  }

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    /** @var \Drupal\Core\Field\FieldItemListInterface $items */
    if (!isset($items)) {
      return;
    }

    foreach ($items as $item) {
      if ($item->isEmpty()) {
        continue;
      }

      // Try to resolve the given URI to a URL. It may fail if it's scheme-less.
      try {
        $url = Url::fromUri($item->getValue()['uri'], ['absolute' => TRUE])->toString();
      }
      catch (\InvalidArgumentException $e) {
        $this->context->addViolation($constraint->urlParseError, ['@error' => $e->getMessage()]);
        return;
      }

      try {
        $options = [
          'allow_redirects' => [
            'strict' => TRUE,
          ],
        ];

        // Perform only a HEAD method to save bandwidth.
        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->httpClient->head($url, $options);
      }
      catch (RequestException $request_exception) {
        $this->context->addViolation($constraint->notValid, [
          '%value' => $url,
        ]);
      }
    }
  }

}
