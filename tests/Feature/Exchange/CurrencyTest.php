<?php

test('it can show a list of foreign currencies', function () {
    $response = $this->getJson('api/exchange/currencies');
    $response->assertStatus(200);
});
