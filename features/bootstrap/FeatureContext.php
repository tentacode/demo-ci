<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

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

    private $sum = 0;
        
    /**
     * @When I add :number
     */
    public function iAdd($number)
    {
        $this->sum += $number;
    }

    /**
     * @Then the sum should be :expectedSum
     */
    public function theSumShouldBe($expectedSum)
    {
        if ($this->sum != $expectedSum) {
            throw new \Exception('Pas égale');
        }
    }
}
