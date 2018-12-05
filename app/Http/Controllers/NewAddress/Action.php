<?php

declare(strict_types=1);

namespace App\Http\Controllers\NewAddress;

use App\Http\Controllers\Controller;
use App\Services\BitcoinClient;

class Action extends Controller
{
    public function __invoke(BitcoinClient $client)
    {
        $address = $client->createAddress();

        return [
            'address' => $address,
        ];
    }
}