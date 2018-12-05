<?php

declare(strict_types=1);

namespace App\Http\Controllers\Logout;

use App\Http\Controllers\Controller;

class Action extends Controller
{
    public function __invoke()
    {
        session()->forget([
            'authenticated',
            'host',
            'username',
            'password',
        ]);

        return redirect()->to('/');
    }
}
