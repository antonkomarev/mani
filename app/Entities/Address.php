<?php

declare(strict_types=1);

namespace App\Entities;

class Address
{
    private $address;

    private $amount;

    private $confirmations;

    private $txids;

    public function __construct(
        string $address,
        $amount,
        int $confirmations,
        array $txids
    )
    {
        $this->address = $address;
        $this->amount = $amount;
        $this->confirmations = $confirmations;
        $this->txids = $txids;
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['address'],
            $data['amount'],
            $data['confirmations'],
            $data['txids']
        );
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    public function getTxids(): array
    {
        return $this->txids;
    }
}
