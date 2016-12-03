<?php declare(strict_types = 1);

namespace Winkbrace\PracticalTDD;

/**
 * This model represents a record in the users table.
 */
final class User
{
    /** @var string */
    public $name;
    /** @var string */
    public $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}
