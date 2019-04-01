<?php
declare(strict_types=1);

namespace SB\EasyHire\Domain;

use Assert\Assertion;

final class Email
{
    /**
     * @var
     */
    private $email;

    /**
     * Email constructor.
     *
     * @param $email
     */
    public function __construct(string $email)
    {
        Assertion::email($email, 'Invalid email', 'sb.easyhire.domain.email');
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
