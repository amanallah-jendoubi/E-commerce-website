<?php

namespace App\Service;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private MailerInterface $mailer;

    public function __construct( MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendContactEmail(
        string $fromEmail,
        string $firstName,
        string $lastName,
        string $subject,
        string $message
    ): void {
        $email = (new Email())
            ->from('kamadotanjiro1478@gmail.com') // Who the email appears to be FROM
            ->to('kamadotanjiro1478@gmail.com')  //  customer service email client is gonna deal with
            ->replyTo($fromEmail) //when hitting reply go back to customer
            ->subject('[Exclusive Support] ' . $subject)
            ->html("
                <h2>New message from {$firstName} {$lastName}</h2>
                <p><strong>From:</strong> {$fromEmail}</p>
                <p><strong>Subject:</strong> {$subject}</p>
                <p><strong>Message:</strong></p>
                <p>{$message}</p>
            ");

        $this->mailer->send($email);
    }
}
