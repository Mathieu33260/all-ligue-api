<?php

namespace App\Command;

use App\DataImporter\Football\Round\RoundDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RoundImporterCommand extends Command
{
    protected static $defaultName = 'import:football:round';

    private RoundDataImporter $roundDataImporter;

    public function __construct(
        RoundDataImporter $roundDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->roundDataImporter = $roundDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import round')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->roundDataImporter->import();

        return 0;
    }
}
