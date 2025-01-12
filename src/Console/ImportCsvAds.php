<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCsvAds extends Command
{
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('import-csv-ads')
            ->setDescription('import-csv-ads command');

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return 1;
    }
}