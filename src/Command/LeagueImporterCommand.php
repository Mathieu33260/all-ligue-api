<?php

namespace App\Command;

use App\DataImporter\Football\League\LeagueDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LeagueImporterCommand extends Command
{
    protected static $defaultName = 'import:football:league';

    private LeagueDataImporter $leagueDataImporter;

    public function __construct(
        LeagueDataImporter $leagueDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->leagueDataImporter = $leagueDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import league')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->leagueDataImporter->import();

        return 0;
    }
}
