<?php

/**
 * This file setups the web module
 */

use League\Config\Configuration;
use Monolog\Logger;

// Instances the app
$app = \DI\Bridge\Slim\Bridge::create($container);

/** @var Configuration */
$config = $container->get(Configuration::class);

$app->setBasePath($config->get("application.base-path"));

// basic route caching
if ($config->get("application.route-caching") !== false) {
  $routeCollector = $app->getRouteCollector();
  md5_file(__DIR__ . "/web-routes.php");
  $file_cache = $config->get("application.cache-path") . "/routes-{$md5_hash}.cache";
  $routeCollector->setCacheFile($file_cache);
}

// middlewares
require_once(__DIR__ . "/web-middlewares.php");

// Routes
require_once(__DIR__ . "/web-routes.php");

// Error middleware
$errorMiddleware = $app->addErrorMiddleware(
  $config->get("application.debug"),
  $config->get("application.log-errors"),
  $config->get("application.log-errors-details"),
  $container->get(Logger::class)
);

// Force error renderer to JSON
$errorHandler = $errorMiddleware->getDefaultErrorHandler();
$errorHandler->forceContentType('application/json');

/**
 * Exec the application
 */
$app->run();
