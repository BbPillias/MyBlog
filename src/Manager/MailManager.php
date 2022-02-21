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
            ->to($userMail)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Reception de votre message')
            ->text('Votre message a bien été receptionné par ma boite mail! Je vous répond au plus vite.');
        // ->html('view/frontend/contat.html.twig');

        $mailer->send($email);
    }

    public function userEmail($name, $userEmail, $message)
    {

        $transport = new GmailSmtpTransport('blog.berengere@gmail.com', 'MonBlog2022');

        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('blog.berengere@gmail.com')
            ->to($userEmail)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Reception de votre message')
            ->text('Votre message a bien été receptionné par ma boite mail! Je vous répond au plus vite.');
        // ->html('view/frontend/contat.html.twig');

        $mailer->send($email);
    }
}
