<?php

namespace App\Command\InPlay;

use App\DataImporter\Football\InPlay\LineupPlayerPositionInPlayDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LineupPlayerPositionInPlayImporterCommand extends Command
{
    protected static $defaultName = 'import:football:inplay:lineup';

    private LineupPlayerPositionInPlayDataImporter $lineupPlayerPositionInPlayDataImporter;

    public function __construct(
        LineupPlayerPositionInPlayDataImporter $lineupPlayerPositionInPlayDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->lineupPlayerPositionInPlayDataImporter = $lineupPlayerPositionInPlayDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import lineup in play')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->lineupPlayerPositionInPlayDataImporter->import();

        return 0;
    }
}
