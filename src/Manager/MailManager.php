<?php

namespace Berengere\Blog\Manager;

use Symfony\Component\Mailer\Bridge\Google\Smtp\GmailTransport;
use Symfony\Component\Mailer\Mailer;

class MailManager
{
    public function confirmationMail()
    {
        $transport = new GmailTransport('blog.berengere@gmail.com', 'MonBlog2022');
        $mailer = new Mailer($transport);
        $mailer->send($email);
    }
}
