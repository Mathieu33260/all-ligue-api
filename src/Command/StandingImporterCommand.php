<?php

namespace App\Command;

use App\DataImporter\Football\Standing\StandingDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StandingImporterCommand extends Command
{
    protected static $defaultName = 'import:football:standing';

    private StandingDataImporter $standingDataImporter;

    public function __construct(
        StandingDataImporter $standingDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->standingDataImporter = $standingDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import standing')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->standingDataImporter->import();

        return 0;
    }
}
