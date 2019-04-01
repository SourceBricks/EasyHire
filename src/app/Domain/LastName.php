<?php
declare(strict_types=1);

namespace SB\EasyHire\Domain;

use Assert\Assertion;

final class LastName
{
    /**
     * @var
     */
    private $lastName;

    /**
     * LastName constructor.
     *
     * @param $lastName
     */
    public function __construct(string $lastName)
    {
        Assertion::string($lastName, 'Invalid last name', 'sb.easyhire.domain.lastname');
        Assertion::notEmpty($lastName, 'Invalid last name', 'sb.easyhire.domain.lastname');
        $this->lastName = $lastName;
    }

    public function __toString(): string
    {
        return $this->lastName;
    }
}
