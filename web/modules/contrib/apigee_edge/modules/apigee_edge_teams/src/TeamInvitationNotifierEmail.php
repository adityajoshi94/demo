<?php

namespace Drupal\apigee_edge_teams;

use Drupal\apigee_edge_teams\Entity\TeamInvitationInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Mail\MailManagerInterface;

/**
 * Handles notifications for team_invitation via email.
 */
class TeamInvitationNotifierEmail implements TeamInvitationNotifierInterface {

  /**
   * The mail service.
   *
   * @var \Drupal\Core\Mail\MailManagerInterface
   */
  protected $mailManager;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * TeamInvitationNotifierEmail constructor.
   *
   * @param \Drupal\Core\Mail\MailManagerInterface $mail_manager
   *   The mail service.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   */
  public function __construct(MailManagerInterface $mail_manager, LanguageManagerInterface $language_manager) {
    $this->mailManager = $mail_manager;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function sendNotificationsFor(TeamInvitationInterface $team_invitation): bool {
    $email = $team_invitation->getRecipient();
    $langcode = $this->languageManager->getDefaultLanguage()->getId();

    $params = [
      'team_invitation' => $team_invitation,
      'user' => NULL,
    ];

    /** @var \Drupal\user\UserInterface $user */
    $user = user_load_by_mail($email);
    if ($user) {
      $langcode = $user->getPreferredLangcode();
      $params['user'] = $user;
    }

    // Send email notification.
    $message = $this->mailManager->mail('apigee_edge_teams', 'team_invitation_created', $email, $langcode, $params);
    return $message['result'];
  }

}
