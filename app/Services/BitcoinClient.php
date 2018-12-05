<?php

declare(strict_types=1);

namespace App\Services;

use App\Entities\Address;
use App\Entities\Transaction;
use Denpa\Bitcoin\Client;

class BitcoinClient
{
    private $client;

    public function __construct()
    {
        $username = session('username');
        $password = session('password');
        $host = session('host');

        $this->client = new Client("http://{$username}:{$password}@{$host}");
    }

    public function getBalance()
    {
        return $this->client->request('GetBalance')->get();
    }

    public function createAddress(): string
    {
        return $this->client->request('GetNewAddress')->get();
    }

    public function listAddresses(): array
    {
        $confirmationsCountRequired = 1;
        $isEmptyAddressVisible = true;

        $response = $this->client->request(
            'ListReceivedByAddress',
            $confirmationsCountRequired,
            $isEmptyAddressVisible
        )->get();

        $addresses = [];
        foreach ($response as $address) {
            $addresses[] = Address::fromArray($address);
        }

        return $addresses;
    }

    public function listTransactions(): array
    {
        $response = $this->client->request('ListTransactions')->get();

        $transactions = [];
        foreach($response as $transaction) {
            $transactions[] = Transaction::fromArray($transaction);
        }

        return $transactions;
    }
}
