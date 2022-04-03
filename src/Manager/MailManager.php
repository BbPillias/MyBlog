<?php

namespace Berengere\Blog\Manager;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;

class MailManager
{
    private Mailer $mailer;

    public function __construct(string $username,string $password)
    {
        $transport = new GmailSmtpTransport($username, $password);
        $this->mailer = new Mailer($transport);
    }

    /**
     * Return email from user
     *
     * @param $name, $userMail, $message
     */
    public function sendEmail(string $name, string $userMail,string $message)
    {

        $email = (new Email())
            ->from('blog.berengere@gmail.com')
            ->to('blog.berengere@gmail.com')
            ->subject(sprintf('Nouveau message de la part de %s %s ', $name, $userMail))
            ->replyTo($userMail)
            ->text($message);
 
            $this->mailer->send($email);
    }

    }
