<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\Domain;

use DateTimeImmutable;

final class OrderRepository
{
    public function getAllOrders(): array
    {
        return [
            new Order(1, Order::PENDING, new DateTimeImmutable(), 100),
            new Order(2, Order::CONFIRMED, (new DateTimeImmutable())->modify('- 10 days'), 100),
            new Order(3, Order::CANCELLED, (new DateTimeImmutable())->modify('- 20 days'), 100),
        ];
    }
}
