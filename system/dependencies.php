<?php

/**
 * This file is reserved for placing system dependencies
 */

use DI\Container;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;

return [
  Logger::class => function (Container $c) {
    $logger = new Logger('application_logging');
    $logger->pushHandler(new ErrorLogHandler(), Logger::ERROR);
    return $logger;
  }
];
