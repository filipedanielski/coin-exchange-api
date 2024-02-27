<?php

namespace App\Domains\Wallet\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWalletRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => 'required|filled|decimal:0,2',
            'currency_id' => 'required|filled|integer|exists:currencies,id',
        ];
    }
}
