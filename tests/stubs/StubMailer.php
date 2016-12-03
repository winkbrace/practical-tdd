<?php declare(strict_types = 1);

namespace Winkbrace\PracticalTDD\Tests\Stubs;

use Winkbrace\PracticalTDD\Mail\Mailer;

/**
 * This is a stub implementation for the Mailer interface.
 */
final class StubMailer implements Mailer
{
    /** @var array */
    private $emails;

    public function send(string $email, string $template)
    {
        $this->emails[$email][] = $template;
    }

    public function getEmails() : array
    {
        return $this->emails;
    }

    public function sentEmailTo(string $email) : bool
    {
        return array_key_exists($email, $this->emails);
    }
}
