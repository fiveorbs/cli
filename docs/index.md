---
title: Introduction
---
FiveOrbs Cli
=========

A command line interface helper like [Laravel's Artisan](https://laravel.com/docs/9.x/artisan) 
with way less magic.

## Installation

    composer require fiveorbs/cli

## Quick Start

Create a Command:

```php
use FiveOrbs\Cli\Command;

class MyCommand extends Command {
    /**
     * The name by which the  MyCommand::run() method
     * is invoked from the command line.
     */
    protected string $name = 'mycommand';

    /**
     * A namespace used to distinguish equally named commands
     * from different package, e. g. `grp:mycommand`
     */
    protected string $prefix = 'grp'; // optional

    /**
     * The group name under which the command will be 
     * listed in the help. Also used as prefix (lowercased)
     * if the prefix is missing
     */
    protected string $group = 'MyGroup';

    /**
     * A short description displayed in the command list
     */
    protected string $description = 'This is my command description';


    /**
     * The entry point of the command.
     */
    public function run(): int
    {
        $this->echo("Run my command\n");

        return 0;
    }

    /**
     * Optional:
     * Used to add information to the commands help text
     * (e. g. `php run help <command>`)
     */
    public function help(): void
    {
        $this->helpHeader(withOptions: true);
        $this->helpOption('-s, --stuff <stuff>', 'Description of --stuff');
    }
}
```

Create a runner script, e. g. `run.php` or simply `run`:

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use FiveOrbs\Cli\{Runner, Commands};
use MyCommand;

$commands = new Commands([new MyCommand()]);
$runner = new Runner($commands);
$runner->run();
```

Run the command:

```console
$ php run mycommand
Run my command

$ php run grp:mycommand
Run my command

$ php run help
Available commands:

MyGroup
    grp:mycommand  This is my command description

$ php run help mycommand
Help entry for my command
```
