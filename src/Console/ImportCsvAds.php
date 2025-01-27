<?php

namespace App\Console;

use http\Client;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCsvAds extends Command
{

    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('import-csv-ads')
            ->setDescription('import-csv-ads command')
            ->addArgument('fileProcessingMode', InputArgument::REQUIRED, 'File processing mode');

    }

    // TODO: Реализовать алгоритм для обработки файла ads.xlsx
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $processingMode = $input->getArgument('fileProcessingMode');
        if ($processingMode) {
            // Do something
        } else {
            // Do something else
        }

        $url = env('HOST') . '/api/upload-ads';

        $client = new \GuzzleHttp\Client();
        $responseCode = $client->get($url)->getStatusCode();

        return match ($responseCode) {
            200 => 1,
            default => 0,
        };
    }
}