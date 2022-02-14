<?php

namespace Berengere\Blog\Manager;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Bridge\Google\Smtp\GmailTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class MailManager
{
    private static $mail;

    public static function getMail()
    {
        if (!isset(self::$mail)) {
            self::$mail = new self;
        }
        return self::$mail;
    }

    public function set(string $name, $value)
    {
        $_POST[$name] = $value;
    }

    public function sendEmail($nom, $email, $message)
    {
        $dsn = ('blog.berengere@gmail.com')('MonBlog2022');
        $transport = Transport::fromDsn($dsn);
        // $transport = new GmailTransport('blog.berengere@gmail.com', 'MonBlog2022');
        // $transport = new EsmtpTransport('localhost');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from()
            ->to('blog.berengere@gmail.com');
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            // ->subject('Time for Symfony Mailer!')
            // ->text('Sending emails is fun again!')
            // ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
    }

}
