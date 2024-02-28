<?php

use App\Domains\Exchange\Exceptions\ExchangeNotFoundException;
use App\Domains\Exchange\Services\PriceService;

test('it can return the price for a valid currency exchange', function () {
    $priceService = new PriceService();
    $price = $priceService->getPrice('BRL', 'USD');
    expect($price)->toBeFloat();
});

test('it throws an exception for an invalid currency exchange', function () {
    $this->withoutExceptionHandling();
    expect(fn () => (new PriceService)->getPrice('BRL', 'ZZZ'))->toThrow(ExchangeNotFoundException::class, 'Conversão não encontrada ou suportada.');
});

test('it can return the price for a valid currency exchange from endpoint', function () {
    $response = $this->get('api/exchange/price?from=BRL&to=USD');

    $response->assertStatus(200);
});

test('it throws an exception for an invalid currency exchange from endpoint', function () {
    $response = $this->get('api/exchange/price?from=BRL&to=ZZZ');

    $response->assertInvalid(['to']);
});
