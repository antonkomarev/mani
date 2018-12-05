<?php

declare(strict_types=1);

namespace App\Entities;

use Illuminate\Support\Carbon;

class Transaction
{
    private $id;

    private $address;

    private $category;

    private $amount;

    private $confirmations;

    private $time;

    private $timeReceived;

    public function __construct(
        string $id,
        string $address,
        string $category,
        $amount,
        int $confirmations,
        int $time,
        int $timeReceived
    )
    {
        $this->id = $id;
        $this->address = $address;
        $this->category = $category;
        $this->amount = $amount;
        $this->confirmations = $confirmations;
        $this->time = Carbon::createFromTimestampUTC($time);
        $this->timeReceived = Carbon::createFromTimestampUTC($timeReceived);
    }

    public static function fromArray(array $data): self
    {
        return new static(
            $data['txid'],
            $data['address'],
            $data['category'],
            $data['amount'],
            $data['confirmations'],
            $data['time'],
            $data['timereceived']
        );
    }

    public function getTxid(): string
    {
        return $this->id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getTime(): Carbon
    {
        return $this->time;
    }

    public function getTimeReceived(): Carbon
    {
        return $this->timeReceived;
    }

    public function getConfirmations(): int
    {
        return $this->confirmations;
    }
}
