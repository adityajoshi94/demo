<?php

namespace Drupal\apigee_edge\Plugin\Validation\Constraint;

use Drupal\apigee_edge\Entity\Developer;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Checks if an email address already belongs to a developer on Edge.
 */
class DeveloperEmailUniqueValidator extends ConstraintValidator implements ContainerInjectionInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  private $entityTypeManager;

  /**
   * Stores email addresses that should not be validated.
   *
   * @var array
   */
  private static $whitelist = [];

  /**
   * DeveloperEmailUniqueValidator constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   Entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    if (empty($items->value) || in_array($items->value, static::$whitelist)) {
      return;
    }
    /** @var \Drupal\Core\Entity\EntityInterface $entity */
    $entity = $items->getEntity();
    // If field's value has not changed do not validate it.
    if (!$entity->isNew()) {
      $original = $this->entityTypeManager->getStorage($entity->getEntityType()->id())->load($entity->id());
      if ($original->{$items->getName()}->value === $items->value) {
        return;
      }
    }
    try {
      $developer = Developer::load($items->value);
      if ($developer) {
        $this->context->addViolation($constraint->message, [
          '%email' => $items->value,
        ]);
      }
    }
    catch (\Exception $exception) {
      // Nothing to do here, if there is no connection to Apigee Edge interrupt
      // the registration in the
      // apigee_edge_form_user_form_api_connection_validate() function.
    }
  }

  /**
   * Whitelist email address for validation.
   *
   * @param string $email
   *   Email address to whitelist.
   */
  public static function whitelist(string $email) {
    static::$whitelist[] = $email;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('entity_type.manager'));
  }

}
