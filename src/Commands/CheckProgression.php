<?php

namespace Progression\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command that performs checking of numerical sequence.
 */
class CheckProgression extends Command
{
    /** {@inheritDoc} */
    protected function configure()
    {
        $this->setName('check-progression');
        $this->setDescription('Checks if input string is progression');
        $this->setHelp('Command checks if sequence is arithmetic or geometric progression.');
    }

    /** {@inheritDoc} */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}