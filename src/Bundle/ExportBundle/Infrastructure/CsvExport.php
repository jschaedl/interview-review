<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\Infrastructure;

final class CsvExport
{
    public function export(array $data, string $filename): void
    {
        $handle = fopen($filename, 'w');

        foreach ($data as $item) {
            fputcsv($handle, $item->toArray(), ';');
        }

        fclose($handle);
    }
}
