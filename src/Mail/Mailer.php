<?php declare(strict_types = 1);

namespace Winkbrace\PracticalTDD\Mail;

interface Mailer
{
    public function send(string $email, string $template);
}
