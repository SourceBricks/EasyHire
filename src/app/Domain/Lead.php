<?php
declare(strict_types=1);

namespace SB\EasyHire\Domain;

use Assert\Assertion;
use function sprintf;

final class Lead
{
    /** @var string */
    private $identifier;
    /** @var FirstName */
    private $firstName;
    /** @var LastName */
    private $lastName;
    /** @var Email */
    private $email;
    /** @var PhoneNumber */
    private $phoneNumber;
    /** @var Referral */
    private $referral;

    public static function appliesByHimself(
        string $identifier,
        FirstName $firstName,
        LastName $lastName,
        Email $email,
        PhoneNumber $phoneNumber
    ): Lead {
        Assertion::uuid($identifier, 'Invalid identifier', 'sb.easyhire.domain.lead.identifier');

        $self = new self();

        $self->identifier  = $identifier;
        $self->firstName   = $firstName;
        $self->lastName    = $lastName;
        $self->email       = $email;
        $self->phoneNumber = $phoneNumber;
        $self->referral    = new AppliedByHimself();

        return $self;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function fullName(): string
    {
        return sprintf('%s %s', $this->firstName, $this->lastName);
    }

    public function referral(): Referral
    {
        return $this->referral;
    }
}
