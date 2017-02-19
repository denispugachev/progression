<?php

namespace TestTask;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command that performs checking of numeric sequence.
 */
class CheckProgressionCommand extends Command
{
    /** Sequence argument */
    const ARGUMENT_SEQUENCE = 'sequence';

    /** {@inheritDoc} */
    protected function configure()
    {
        $this->setName('check-progression');
        $this->setDescription('Checks if input string is progression');
        $this->setHelp('Command checks if sequence is arithmetic or geometric progression.');
        $this->addArgument(static::ARGUMENT_SEQUENCE, InputArgument::REQUIRED);
    }

    /** {@inheritDoc} */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sequence = $input->getArgument(static::ARGUMENT_SEQUENCE);

        try {
            $types = (new CheckerComponent())->check($sequence);
        } catch (\Exception $e) {
            $output->writeln('There was an error while checking sequence: ' . $e->getMessage());
        } catch (\Throwable $e) {
            $output->writeln('There was an error while checking sequence: ' . $e->getMessage());
        }

        if (!empty($types)) {
            $output->writeln('Your sequence is progression of these types: ' . implode(', ', $types));
        } else {
            $output->writeln('Your sequence is not a progression');
        }
    }
}