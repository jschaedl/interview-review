<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\Command;

use App\Bundle\ExportBundle\Domain\OrderRepository;
use App\Bundle\ExportBundle\Infrastructure\CsvExport;
use App\Bundle\ExportBundle\Infrastructure\JsonExport;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class ExportCommand extends Command
{
    protected static $defaultName = 'app:export';

    private $exportPath;

    private $repository;

    public function __construct(string $exportPath)
    {
        $this->exportPath = $exportPath;
        $this->repository = new OrderRepository();

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addOption('format', 'f', InputOption::VALUE_REQUIRED, 'csv, json, etc.', 'csv');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $format = $input->getOption('format');

        if ('csv' === $format) {
            $all = $this->repository->getAllOrders();
            (new CsvExport())->export($all, $this->exportPath . '/export.csv');
        } elseif ('json' === $format) {
            $all = $this->repository->getAllOrders();
            (new JsonExport())->export($all, $this->exportPath . '/export.json');
        }

        return 0;
    }
}
