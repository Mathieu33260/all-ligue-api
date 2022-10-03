<?php

namespace App\Command;

use App\DataImporter\Football\TeamStat\TeamStatDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TeamStatImporterCommand extends Command
{
    protected static $defaultName = 'import:football:teamstat';

    private TeamStatDataImporter $teamStatDataImporter;

    public function __construct(
        TeamStatDataImporter $teamStatDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->teamStatDataImporter = $teamStatDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import team stat')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->teamStatDataImporter->import();

        return 0;
    }
}
