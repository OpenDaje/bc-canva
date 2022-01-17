<?php declare(strict_types=1);

namespace BcCanva\Behat\Context;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class WalkingSkeletonContext implements Context
{
    private string $binFolder;

    private string $output;

    private int $return;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->binFolder = __DIR__ . '/../../bin/';
        $this->output = '';
    }

    /**
     * @When I run :command
     */
    public function iRun($command)
    {
        $poser = $this->binFolder . $command;
        $this->return = -1;
        ob_start();
        passthru("cd {$this->binFolder};php $command", $this->return);
        $this->output = ob_get_clean();
    }

    /**
     * @Then it should retrieve :applicationName
     */
    public function itShouldRetrieve($expectedApplicationName)
    {
        Assert::assertStringContainsString($expectedApplicationName, $this->output);
    }

    /**
     * @Then it should pass
     */
    public function itShouldPass()
    {
        if (0 !== $this->return) {
            throw new \Exception('Error executing ' . $this->return);
        }
    }

    /**
     * @Then it should retrieve the version as :softwareVersion
     */
    public function itShouldRetrieveTheVersionAs($expectedSoftwareVersion)
    {
        Assert::assertStringContainsString($expectedSoftwareVersion, $this->output);
    }
}
