<?php

namespace Berengere\Blog\Manager;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;

class MailManager
{

    public function sendEmail($name, $userMail, $message)
    {

        $transport = new GmailSmtpTransport('blog.berengere@gmail.com', 'MonBlog2022');

        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('blog.berengere@gmail.com')
            ->to('blog.berengere@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!');
        // ->html('view/frontend/contat.html.twig');

        $mailer->send($email);
    }
}
