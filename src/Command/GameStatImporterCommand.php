<?php

namespace App\Command;

use App\DataImporter\Football\GameStat\GameStatDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameStatImporterCommand extends Command
{
    protected static $defaultName = 'import:football:gamestat';

    private GameStatDataImporter $gameStatDataImporter;

    public function __construct(
        GameStatDataImporter $gameStatDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->gameStatDataImporter = $gameStatDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import game stat')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->gameStatDataImporter->import();

        return 0;
    }
}
