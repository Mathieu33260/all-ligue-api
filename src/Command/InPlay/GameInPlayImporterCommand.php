<?php

namespace App\Command\InPlay;

use App\DataImporter\Football\InPlay\GameInPlayDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameInPlayImporterCommand extends Command
{
    protected static $defaultName = 'import:football:inplay:game';

    private GameInPlayDataImporter $gameInPlayDataImporter;

    public function __construct(
        GameInPlayDataImporter $gameInPlayDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->gameInPlayDataImporter = $gameInPlayDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import game in play')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->gameInPlayDataImporter->import();

        return 0;
    }
}
