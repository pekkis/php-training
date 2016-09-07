<?php
declare(strict_types=1);

namespace Pekkis\Koulutus\Services;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_Message;

class Mailer
{
    public function __construct()
    {
        $transport = Swift_SmtpTransport::newInstance('dr-kobros.com', 25);
        $this->mailer = Swift_Mailer::newInstance($transport);
    }

    /**
     * @param string $sender
     * @param string $receiver
     * @param string $subject
     * @param string $message
     * @return bool
     * @throws \Exception
     */
    public function sendMail(string $sender, string $receiver, string $subject, string $message)
    {
        $message = Swift_Message::newInstance()
            ->setFrom($sender)
            ->setTo($receiver)
            ->setSubject($subject)
            ->setBody($message)
        ;

        return $this->mailer->send($message);
    }

}