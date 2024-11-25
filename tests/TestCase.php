<?php

declare(strict_types=1);

namespace FiveOrbs\Cli\Tests;

use FiveOrbs\Cli\Commands;
use FiveOrbs\Cli\Runner;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class TestCase extends BaseTestCase
{
    public function getCommands(): Commands
    {
        return new Commands([
            new Fixtures\FooStuff(),
            new Fixtures\BarStuff(),
            new Fixtures\FooDrivel(),
            new Fixtures\Erring(),
        ]);
    }

    public function getRunner(): Runner
    {
        return new Runner($this->getCommands());
    }
}
