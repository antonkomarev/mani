<?php

declare(strict_types=1);

namespace App\Http\Controllers\Authenticate;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return session()->has('authenticated') === false
            || session('authenticated') === false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'host' => [
                'required',
                'string',
                // TODO: Validate URI
            ],
            'username' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }
}
