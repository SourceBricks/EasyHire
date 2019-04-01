<?php
declare(strict_types=1);

namespace SB\EasyHire\Domain;

use Assert\Assertion;

final class FirstName
{
    /**
     * @var
     */
    private $firstName;

    /**
     * Firstname constructor.
     *
     * @param $firstName
     */
    public function __construct(string $firstName)
    {
        Assertion::string($firstName, 'Invalid first name', 'sb.easyhire.domain.firstname');
        Assertion::notEmpty($firstName, 'Invalid first name', 'sb.easyhire.domain.firstname');
        $this->firstName = $firstName;
    }

    public function __toString(): string
    {
        return $this->firstName;
    }
}
