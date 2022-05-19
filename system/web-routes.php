<?php

/**
 * This file is reserved for placing application routes
 */

use App\Controllers\SampleController;
use Slim\App;

/** @var App $app */

$app->get("/", [SampleController::class, 'home']);
$app->get("/users/list/{id:[0-9]+}", [SampleController::class, 'listUsers']);
