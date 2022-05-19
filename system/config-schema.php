<?php

use Nette\Schema\Expect;

return [
  'application' => Expect::structure([
    'debug' => Expect::bool(true),
    'log-errors' => Expect::bool(true),
    'log-errors-details' => Expect::bool(true),
    'base-path' => Expect::string(""),
    'dependency-caching' => Expect::bool(false),
    'route-caching' => Expect::bool(false),
    'cache-path' => Expect::string(__DIR__ . "/../cache")->assert(fn ($path) => is_writeable($path))
  ]),
];
