<?php

namespace App\Command;

use App\DataImporter\Football\Player\PlayerDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayerImporterCommand extends Command
{
    protected static $defaultName = 'import:football:player';

    private PlayerDataImporter $playerDataImporter;

    public function __construct(
        PlayerDataImporter $playerDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->playerDataImporter = $playerDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import player')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->playerDataImporter->import();

        return 0;
    }
}
