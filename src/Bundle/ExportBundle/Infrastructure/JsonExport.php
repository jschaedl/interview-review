<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\Infrastructure;

use App\Bundle\ExportBundle\Domain\Order;

final class JsonExport
{
    /**
     * @param Order[] $data
     */
    public function export(array $data, string $filename): void
    {
        $data = array_map(
            static function (Order $item) {
                return $item->toArray();
            },
            $data
        );

        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    }
}
