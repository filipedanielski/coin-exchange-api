<?php

namespace App\Domains\Exchange\Services;

use App\Domains\Exchange\Exceptions\ExchangeNotFoundException;
use Illuminate\Support\Facades\Http;

class PriceService
{
    public function getAskPrice(string $origin_currency, string $target_currency)
    {
        $response = Http::withUrlParameters([
            'endpoint' => 'https://economia.awesomeapi.com.br/json/last',
            'origin_currency' => $origin_currency,
            'target_currency' => $target_currency,
        ])->get('{+endpoint}/{origin_currency}-{target_currency}');
        if ($response->status() === 404) {
            throw new ExchangeNotFoundException();
        }

        return floatval($response->collect()->first()['ask']);
    }
}
