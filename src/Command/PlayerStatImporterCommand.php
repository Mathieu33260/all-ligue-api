<?php

namespace App\Command;

use App\DataImporter\Football\PlayerStat\PlayerStatDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PlayerStatImporterCommand extends Command
{
    protected static $defaultName = 'import:football:playerstat';

    private PlayerStatDataImporter $playerStatDataImporter;

    public function __construct(
        PlayerStatDataImporter $playerStatDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->playerStatDataImporter = $playerStatDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import player stat')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->playerStatDataImporter->import();

        return 0;
    }
}
