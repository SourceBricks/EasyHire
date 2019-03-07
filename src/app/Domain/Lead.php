<?php

namespace SB\EasyHire\Domain;

use Assert\Assertion;

class Lead
{
    private $identifier;

    private $firstName;

    private $lastName;

    public static function create(string $identifier, string $firstName,string $lastName): Lead
    {
        Assertion::uuid($identifier, 'Invalid identifier', 'sb.easyhire.domain.lead.identifier');
        // todo check how to chain assertions
        Assertion::string($firstName, 'Invalid Firstname', 'sb.easyhire.domain.lead.firstname');
        Assertion::notEmpty($firstName, 'Invalid Firstname', 'sb.easyhire.domain.lead.firstname');
        Assertion::string($lastName, 'Invalid Lastname', 'sb.easyhire.domain.lead.lastname');
        Assertion::notEmpty($lastName, 'Invalid Lastname', 'sb.easyhire.domain.lead.lastname');

        $self = new self();

        $self->identifier = $identifier;
        $self->firstName = $firstName;
        $self->lastName = $lastName;

        return $self;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
