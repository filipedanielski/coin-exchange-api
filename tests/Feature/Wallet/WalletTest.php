<?php

use App\Domains\Exchange\Models\Currency;
use App\Models\User;

test('it shows a 404 message if there are no funds', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get('api/wallet');

    $response->assertStatus(404);
});

test('it can add funds to wallet', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 123.45,
            'currency_id' => Currency::BRL,
        ]);

    $response->assertStatus(200);
});

test('it can show a wallet with funds', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('api/wallet', [
            'quantity' => 321.54,
            'currency_id' => Currency::BRL,
        ]);

    $response = $this
        ->actingAs($user)
        ->get('api/wallet');

    $response->assertStatus(200);
});
