<?php

namespace App\Domains\Exchange\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => 'required|filled|decimal:0,2|min:50',
            'from' => 'required|filled|string|exists:currencies,code',
            'to' => 'required|filled|string|exists:currencies,code',
        ];
    }
}
