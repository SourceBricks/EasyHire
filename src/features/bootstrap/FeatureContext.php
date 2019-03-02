<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use SB\EasyHire\Funnel;
use SB\EasyHire\FunnelInterface;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var FunnelInterface
     */
    private $funnel;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->funnel = new Funnel();
    }

    /**
     * @When lead tries to submit data with firstname :firstName, lastname :lastName, and valid email :email should not get validation error
     */
    public function leadTriesToSubmitDataWithFirstnameLastnameAndValidEmailShouldNotGetValidationError($firstName, $lastName, $email)
    {
        $this->funnel->createLead($firstName, $lastName, $email);
    }
}
