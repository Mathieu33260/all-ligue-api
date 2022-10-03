<?php

namespace App\Command;

use App\DataImporter\Football\Lineup\LineupDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LineupImporterCommand extends Command
{
    protected static $defaultName = 'import:football:lineup';

    private LineupDataImporter $lineupDataImporter;

    public function __construct(
        LineupDataImporter $lineupDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->lineupDataImporter = $lineupDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import lineup')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->lineupDataImporter->import();

        return 0;
    }
}
