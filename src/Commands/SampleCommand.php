<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SampleCommand extends Command
{
  protected static $defaultName = 'app:sample-command';
  protected static $defaultDescription = 'This is a sample command';

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $output->writeln("hello world");
    return Command::SUCCESS;
  }
}
