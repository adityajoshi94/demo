<?php

namespace Drupal\apigee_edge_actions\Plugin\RulesAction;

use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\rules\Plugin\RulesAction\SystemEmailToUsersOfRole as RulesSystemMailToUsersOfRole;
use Drupal\user\RoleStorageInterface;
use Drupal\user\UserStorageInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Overrides Rules SystemEmailToUsersOfRole to fix parameter upcasting.
 */
class SystemEmailToUsersOfRole extends RulesSystemMailToUsersOfRole {

  /**
   * The user storage service.
   *
   * @var \Drupal\user\RoleStorageInterface
   */
  protected $roleStorage;

  /**
   * SystemEmailToUsersOfRole constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Logger\LoggerChannelInterface $logger
   *   The rules logger service.
   * @param \Drupal\Core\Mail\MailManagerInterface $mail_manager
   *   The mail manager service.
   * @param \Drupal\user\UserStorageInterface $userStorage
   *   The user storage service.
   * @param \Drupal\user\RoleStorageInterface $role_storage
   *   The role storage service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LoggerChannelInterface $logger, MailManagerInterface $mail_manager, UserStorageInterface $userStorage, RoleStorageInterface $role_storage) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $logger, $mail_manager, $userStorage);
    $this->roleStorage = $role_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('logger.factory')->get('rules'),
      $container->get('plugin.manager.mail'),
      $container->get('entity_type.manager')->getStorage('user'),
      $container->get('entity_type.manager')->getStorage('user_role')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function doExecute(array $roles, $subject, $message, $reply = NULL, LanguageInterface $language = NULL) {
    // SystemMailToUsersOfRole::doExecute() expects an array of RoleInterface.
    // Upcast $roles from string[] to RoleInterface[].
    // @see https://www.drupal.org/project/rules/issues/2800749
    $roles = $this->roleStorage->loadMultiple($roles);
    parent::doExecute($roles, $subject, $message, $reply, $language);
  }

}
