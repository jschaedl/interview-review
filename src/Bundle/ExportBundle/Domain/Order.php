<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\Domain;

use DateTimeImmutable;

final class Order
{
    public const PENDING = 'pending';
    public const CONFIRMED = 'confirmed';
    public const CANCELLED = 'cancelled';

    private $id;

    private $status;

    private $createdAt;

    private $price;

    public function __construct(int $id, string $status, DateTimeImmutable $createdAt, int $price)
    {
        $this->id = $id;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->price = $price;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->createdAt->format('Y-m-d'),
            'price' => $this->price
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}
