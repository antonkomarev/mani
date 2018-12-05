<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\BitcoinClient;
use Denpa\Bitcoin\Exceptions\ConnectionException;
use Throwable;

class Action extends Controller
{
    public function __invoke(BitcoinClient $client)
    {
        try {
            $balance = $client->getBalance();
            $addresses = $client->listAddresses();
            $transactions = $client->listTransactions();
        } catch (ConnectionException $exception) {
            session()->forget('authenticated');
            session()->flash('status', 'Lost connection to Bitcoind server.');

            return redirect()->to('/');
        } catch (Throwable $exception) {
            session()->forget('authenticated');
            session()->flash('status', $exception->getMessage());

            return redirect()->to('/');
        }

        return view('home', [
            'balance' => $balance,
            'addresses' => $addresses,
            'transactions' => $transactions,
        ]);
    }
}
