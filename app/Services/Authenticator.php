<?php

declare(strict_types=1);

namespace App\Services;

use Denpa\Bitcoin\Client as BitcoinClient;

class Authenticator
{
    private $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @throws \Denpa\Bitcoin\Exceptions\ConnectionException
     */
    public function connect(string $username, string $password): void
    {
        $client = new BitcoinClient("http://{$username}:{$password}@{$this->host}");
        $client->request('GetBalance');
    }
}
