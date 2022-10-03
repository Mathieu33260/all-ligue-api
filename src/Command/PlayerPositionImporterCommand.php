<?php

namespace App\Command;

use App\DataImporter\Football\PlayerPosition\PlayerPositionDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayerPositionImporterCommand extends Command
{
    protected static $defaultName = 'import:football:playerposition';

    private PlayerPositionDataImporter $playerPositionDataImporter;

    public function __construct(
        PlayerPositionDataImporter $playerPositionDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->playerPositionDataImporter = $playerPositionDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import player position')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->playerPositionDataImporter->import();

        return 0;
    }
}
