<?php

namespace Berengere\Blog\Controller;

use Exception;
use Berengere\Blog\Manager\MailManager;

class ContactController
{
    private MailManager $mailManager;

    public function __construct(MailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    /**
     * Confirm email using mail manager
     */
    public function confirmEmail($name, $email, $message)
    {
        $newEmail = $this->mailManager->sendEmail($name, $email, $message);

        if ($newEmail === false) {
            throw new Exception('Impossible d\'envoyer le message');
        } else {
            header('Location: index.php?action=home');
        }
    }
}
