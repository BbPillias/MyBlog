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

    public function confirmationMail($name, $email, $message)
    {
        $newEmail = $this->mailManager->sendEmail($name, $email, $message);

        if ($newEmail === false) {
            throw new Exception('Impossible d\'envoyer le message');
        } else {
            $mail = MailManager::getMail();

            $mail->set('name', $name);
            $mail->set('email', $email);
            $mail->set('message', $message);

            header('Location: index.php?action=home');
        }
    }
}
