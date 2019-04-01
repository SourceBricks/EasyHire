<?php

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;
use Ramsey\Uuid\Uuid;
use SB\EasyHire\Domain\Email;
use SB\EasyHire\Domain\FirstName;
use SB\EasyHire\Domain\LastName;
use SB\EasyHire\Domain\Lead;
use SB\EasyHire\Domain\PhoneNumber;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /** @var Lead */
    private $lead;


    /**
     * @When user submits firstname :arg1, lastname :arg2, email :arg3, phone number :arg4
     */
    public function userSubmitsFirstnameLastnameEmailPhoneNumber($arg1, $arg2, $arg3, $arg4)
    {
        $this->lead = Lead::appliesByHimself(
            Uuid::uuid4()->toString(),
            new FirstName($arg1),
            new LastName($arg2),
            new Email($arg3),
            new PhoneNumber($arg4)
        );
    }

    /**
     * @Then Lead should be created with referral :arg1
     */
    public function leadShouldBeCreatedWithReferral($arg1)
    {
        Assert::assertEquals($arg1, $this->lead->referral());
    }
}
