<?php

namespace App\Command;

use App\DataImporter\Football\Game\GameDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameImporterCommand extends Command
{
    protected static $defaultName = 'import:football:game';

    private GameDataImporter $gameDataImporter;

    public function __construct(
        GameDataImporter $gameDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->gameDataImporter = $gameDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import game')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->gameDataImporter->import();

        return 0;
    }
}
