<?php

/**
 * This file setups the console module
 */

use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\FactoryCommandLoader;

$app = new Application();

$console_commands = require(__DIR__ . "/console-commands.php");
$factories = array_map(function ($command_class) use ($container) {
  return fn () => $container->get($command_class);
}, $console_commands);

$app->setCommandLoader(new FactoryCommandLoader($factories));

$app->run();
