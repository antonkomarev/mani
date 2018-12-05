<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\BitcoinClient;

class Action extends Controller
{
    public function __invoke(BitcoinClient $client)
    {
        $balance = $client->getBalance();
        $addresses = $client->listAddresses();
        $transactions = $client->listTransactions();

        return view('home', [
            'balance' => $balance,
            'addresses' => $addresses,
            'transactions' => $transactions,
        ]);
    }
}
