<?php

// This file is reserved for placing application commands

use App\Commands\SampleCommand;

return [
  SampleCommand::getDefaultName() => SampleCommand::class
];
