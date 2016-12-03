<?php declare(strict_types = 1);

namespace Winkbrace\PracticalTDD\Tests;

use Winkbrace\PracticalTDD\NewsletterMailer;
use Winkbrace\PracticalTDD\Tests\Stubs\StubMailer;
use Winkbrace\PracticalTDD\User;
use Winkbrace\PracticalTDD\UserRepository;

class NewsletterMailerTest extends \PHPUnit_Framework_TestCase
{
    /** @var StubMailer */
    private $mailer;
    /** @var NewsletterMailer */
    private $newsletterMailer;

    public function setUp()
    {
        $this->mailer = new StubMailer();

        $user1 = new User('John Doe', 'john@example.com');
        $user2 = new User('Jane Doe', 'jane@example.com');

        $userRepo = \Mockery::mock(UserRepository::class);
        $userRepo->shouldReceive('fetchSubscribers')->andReturn([$user1, $user2]);

        $this->newsletterMailer = new NewsletterMailer($this->mailer, $userRepo);
    }

    /** @test */
    public function it_should_mail_a_user()
    {
        $this->newsletterMailer->mail(new User('Bas de Ruiter', 'info@basderuiter.nl'));

        $this->assertTrue($this->mailer->sentEmailTo('info@basderuiter.nl'));
    }

    /** @test */
    public function it_should_mail_all_users()
    {
        $this->newsletterMailer->mailAll();

        $this->assertTrue($this->mailer->sentEmailTo('john@example.com'));
        $this->assertTrue($this->mailer->sentEmailTo('jane@example.com'));
    }
}
