<?php

namespace App\Command;

use App\DataImporter\Football\Round\CurrentRoundDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CurrentRoundImporterCommand extends Command
{
    protected static $defaultName = 'import:football:round:current';

    private CurrentRoundDataImporter $currentRoundDataImporter;

    public function __construct(
        CurrentRoundDataImporter $currentRoundDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->currentRoundDataImporter = $currentRoundDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import current round')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->currentRoundDataImporter->import();

        return 0;
    }
}
