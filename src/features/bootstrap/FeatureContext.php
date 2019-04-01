<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PhpSpec\Exception\Example\PendingException;
use PHPUnit\Framework\Assert;
use Ramsey\Uuid\Uuid;
use SB\EasyHire\Domain\Lead;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When app tries to create lead with firstname :arg1, lastname :arg2 we should not get validation error
     */
    public function appTriesToCreateLeadWithFirstnameLastnameWeShouldNotGetValidationError($arg1, $arg2)
    {
        $lead = Lead::create(Uuid::uuid4()->toString(), $arg1, $arg2);
        Assert::assertSame($arg1 . ' ' . $arg2, $lead->fullName());
    }
}
