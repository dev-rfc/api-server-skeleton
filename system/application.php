<?php

/**
 * Setups the application
 */

use DI\ContainerBuilder;
use League\Config\Configuration;

require __DIR__ . '/../vendor/autoload.php';

/** @var Configuration */
$config = new Configuration(require(__DIR__ . "/config-schema.php"));
if (file_exists(__DIR__ . '/config.json')) {
  $config->merge(json_decode(file_get_contents(__DIR__ . '/config.json'), true));
}

// Setup DI container
$builder = new ContainerBuilder();
//$builder->useAutowiring(false);
$builder->useAnnotations(false);

if ($config->get("application.dependency-caching")) {
  $builder->enableCompilation($config->get("application.cache-path"));
  $builder->writeProxiesToFile(true, __DIR__ . $config->get("application.cache-path") . "/proxies");
}

// Setup configuration schema and load the config.
$builder->addDefinitions([Configuration::class => fn ($container) => $config]);

// Add command definitions
if (php_sapi_name() === "cli") {
  $console_commands_classes = array_values(require(__DIR__ . "/console-commands.php"));
  $console_commands_definitions = array_map(fn ($class) => [$class => DI\create()], $console_commands_classes);
  $builder->addDefinitions(array_merge(...$console_commands_definitions));
}

// Setup dependencies
$builder->addDefinitions(__DIR__ . '/dependencies.php');
$container = $builder->build();

// Launch web or console module
require_once(php_sapi_name() === "cli"
  ? __DIR__ . '/console-bootstrap.php'
  : __DIR__ . '/web-bootstrap.php'
);
