<?php

namespace Spyl\Bundle\BakaBundle\Behat;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeScenarioScope;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Spyl\Bundle\BakaBundle\Command\LoadCommand;

class CommandContext extends DefaultContext
{
    private $application;
    private $tester;
    private $exitCode = 0;

     /**
     * @var \Exception
     */
    private $commandException;

    /**
     * @BeforeScenario
     */
    public function loadCommands()
    {
        $this->application = new Application($this->kernel);
        $this->application->add(new LoadCommand());
    }

    /**
     * @When /^I run "([^"]*)" command$/
     */
    public function iRunCommand($name)
    {
        $command = $this->application->find($name);

        try {
            $this->tester = new CommandTester($command);
            $this->exitCode = $this->tester->execute(array('command' => $command->getName()));
        } catch (\Exception $exception) {
            $this->commandException = $exception;
            $this->exitCode         = $exception->getCode();
        }
    }

    /**
     * @Then /^The command exit code should be (\d+)$/
     */
    public function theCommandExitCodeShouldBe($exitCode)
    {
        \PHPUnit_Framework_Assert::assertEquals($exitCode, $this->exitCode);
    }

    /**
     * @Then /^I should see "([^"]*)"$/
     */
    public function iShouldSee($string)
    {
        \PHPUnit_Framework_Assert::assertContains($string, $this->tester->getDisplay());
    }

}
