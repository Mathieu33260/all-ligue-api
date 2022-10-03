<?php

namespace App\Command;

use App\DataImporter\Football\Event\EventDataImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class EventImporterCommand extends Command
{
    protected static $defaultName = 'import:football:event';

    private EventDataImporter $eventDataImporter;

    public function __construct(
        EventDataImporter $eventDataImporter,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->eventDataImporter = $eventDataImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('import event')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->eventDataImporter->import();

        return 0;
    }
}
