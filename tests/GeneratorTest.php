<?php declare(strict_types=1);

namespace OpenDaje\BcCanva\Tests;

use OpenDaje\BcCanva\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function foo(): void
    {
        $x = new Generator();

        $x->generate();
    }
}
