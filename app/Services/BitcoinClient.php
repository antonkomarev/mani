<?php

declare(strict_types=1);

namespace App\Services;

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

        return $this->client->request('ListReceivedByAddress', $confirmationsCountRequired, $isEmptyAddressVisible)->get();
    }

    public function listTransactions()
    {
        return $this->client->request('ListTransactions')->get();
    }
}
