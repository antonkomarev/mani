<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use App\Services\Authenticator;
use Denpa\Bitcoin\Exceptions\ConnectionException;
use Illuminate\Validation\ValidationException;
use Throwable;

class Action extends Controller
{
    public function __invoke(Request $request)
    {
        $host = $request->input('host');
        $username = $request->input('username');
        $password = $request->input('password');

        try {
            $authenticator = new Authenticator($host);
            $authenticator->connect($username, $password);
        } catch (ConnectionException $exception) {
            $error = ValidationException::withMessages([
                'username' => ['Invalid username or password'],
                'password' => ['Invalid password or password'],
            ]);
            throw $error;
        } catch (Throwable $exception) {
            session()->flash('status', $exception->getMessage());

            return redirect()->back()->withInput();
        }

        session()->put('authenticated', true);
        session()->put('host', $host);
        session()->put('username', $username);
        session()->put('password', $password);

        return redirect()->to('home');
    }
}
