<?php

use App\Domains\Exchange\Models\Currency;
use App\Models\User;

test('it shows a 404 message if user has no transactions', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('api/exchange/transaction');

    $response->assertStatus(404);
});

test('it can create a new transaction', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 123.45,
            'currency_id' => Currency::BRL,
        ]);

    $response = $this
        ->actingAs($user)
        ->post('api/exchange/transaction', [
            'quantity' => 123.45,
            'from' => 'BRL',
            'to' => 'USD',
        ]);

    $response->assertStatus(200);
});

test('it cannot create a new transaction with less than 50 BRL', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/exchange/transaction', [
            'quantity' => 49,
            'from' => 'BRL',
            'to' => 'USD',
        ]);

    $response->assertInvalid(['quantity']);
});

test('it cannot create a new transaction with an invalid exchange', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 123.45,
            'currency_id' => Currency::BRL,
        ]);

    $response = $this
        ->actingAs($user)
        ->post('api/exchange/transaction', [
            'quantity' => 234.56,
            'from' => 'BRL',
            'to' => 'XAU',
        ]);

    $response->assertInvalid(['to']);
});

test('it throws an error if the user has insuffient funds', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 123.45,
            'currency_id' => Currency::BRL,
        ]);

    $response = $this
        ->actingAs($user)
        ->post('api/exchange/transaction', [
            'quantity' => 234.56,
            'from' => 'BRL',
            'to' => 'USD',
        ]);

    $response->assertStatus(403);
});

test('it can show a transaction list', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 123.45,
            'currency_id' => Currency::BRL,
        ]);

    $this->actingAs($user)
        ->post('api/exchange/transaction', [
            'quantity' => 123.45,
            'from' => 'BRL',
            'to' => 'USD',
        ]);

    $response = $this
        ->actingAs($user)
        ->get('api/exchange/transaction');

    $response->assertStatus(200);
});
