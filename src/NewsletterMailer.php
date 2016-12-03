<?php declare(strict_types = 1);

namespace Winkbrace\PracticalTDD;

use Winkbrace\PracticalTDD\Mail\Mailer;

/**
 * This class is responsible for mailing our newsletter to subscribers.
 */
final class NewsletterMailer
{
    /** @var Mailer */
    private $mailer;
    /** @var UserRepository */
    private $userRepo;

    public function __construct(Mailer $mailer, UserRepository $userRepo)
    {
        $this->mailer = $mailer;
        $this->userRepo = $userRepo;
    }

    public function mailAll()
    {
        foreach ($this->userRepo->fetchSubscribers() as $user) {
            $this->mail($user);
        }
    }

    public function mail(User $user)
    {
        $this->mailer->send($user->email, 'newsletter.html');
    }
}
