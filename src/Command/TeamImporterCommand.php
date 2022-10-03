<?php

namespace App\Command;

use App\DataImporter\Football\Team\TeamDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TeamImporterCommand extends Command
{
    protected static $defaultName = 'import:football:team';

    private TeamDataImporter $teamDataImporter;

    public function __construct(
        TeamDataImporter $teamDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->teamDataImporter = $teamDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import team')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->teamDataImporter->import();

        return 0;
    }
}
