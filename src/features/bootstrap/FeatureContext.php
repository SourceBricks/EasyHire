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

    private $firstName;

    private $lastName;

    private $email;

    private $phone;

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

    /**
     * @Given that lead is on online vacancy application form
     */
    public function thatLeadIsOnOnlineVacancyApplicationForm()
    {
        $this->lead = null;
    }

    /**
     * @Given enters :arg1 in firstname
     */
    public function entersInFirstname($arg1)
    {
        $this->firstName = $arg1;
    }

    /**
     * @Given enters :arg1 in lastname
     */
    public function entersInLastname($arg1)
    {
        $this->lastName = $arg1;
    }

    /**
     * @Given enters :arg1 in email
     */
    public function entersInEmail($arg1)
    {
        $this->email = $arg1;
    }

    /**
     * @Given enters :arg1 in phone number
     */
    public function entersInPhoneNumber($arg1)
    {
        $this->phone = $arg1;
    }

    /**
     * @Given submits data
     */
    public function submitsData()
    {
        $this->lead = Lead::appliesByHimself(
            Uuid::uuid4()->toString(),
            new FirstName($this->firstName),
            new LastName($this->lastName),
            new Email($this->email),
            new PhoneNumber($this->phone)
        );
    }

    /**
     * @Then lead should be created with applied-by-himself referral
     */
    public function leadShouldBeCreatedWithAppliedByHimselfReferral()
    {
        Assert::assertEquals('applied-by-himself', $this->lead->referral());
    }
}
