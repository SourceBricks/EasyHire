<?php

namespace SB\EasyHire\Domain;

use Assert\Assertion;

final class PhoneNumber
{
    /**
     * @var
     */
    private $phoneNumber;

    /**
     * PhoneNumber constructor.
     *
     * @param $phoneNumber
     */
    public function __construct(string $phoneNumber)
    {
        // TODO proper set of validation rules for phone no
        Assertion::string($phoneNumber, 'Invalid phone number', 'sb.easyhire.domain.phonenumber');
        Assertion::notEmpty($phoneNumber, 'Invalid phone number', 'sb.easyhire.domain.phonenumber');
        $this->phoneNumber = $phoneNumber;
    }

    public function __toString(): string
    {
        return $this->phoneNumber;
    }
}
