<?php

namespace SB\EasyHire\Domain;

use Assert\Assertion;

class Hire implements Pipeline
{
    private $identifier;

    private $name;

    private $description;

    private $steps;

    /**
     * @param string $identifier
     * @param string $name
     * @param string $description
     * @param array $steps
     *
     * @return Hire
     */
    public static function create(
        string $identifier,
        string $name,
        string $description,
        array $steps
    ): self {


        Assertion::uuid($identifier, 'Invalid identifier', 'sb.easyhire.domain.hire.identifier');
        Assertion::string($name, 'Invalid Name', 'sb.easyhire.domain.lead.name');
        Assertion::notEmpty($name, 'Invalid Name', 'sb.easyhire.domain.lead.name');
        Assertion::string($description, 'Invalid Description', 'sb.easyhire.domain.lead.description');
        Assertion::notEmpty($description, 'Invalid Description', 'sb.easyhire.domain.lead.description');
        Assertion::allIsInstanceOf($steps, Step::class);
        Assertion::minCount($steps, 1);

        $hire = new Hire();

        $hire->identifier = $identifier;
        $hire->name = $name;
        $hire->description = $description;
        $hire->steps = $steps;

        return $hire;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
