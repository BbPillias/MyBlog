<?php

namespace Berengere\Blog\Controller;

use Exception;
use Berengere\Blog\Manager\MailManager;

class ContactController {

    private MailManager $mailManager;

    public function __construct(MailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    public function confirmationMail($name, $mail, $message)
    {
        $email = $this->mailManager->newEmail($name, $mail, $message);

        if ($email === false) {
            throw new Exception('Impossible d\'envoyer le message');
        } else {
            header('Location: index.php?action=home');
        }
    }

}