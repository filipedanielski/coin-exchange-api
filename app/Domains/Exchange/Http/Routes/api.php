<?php

Route::get('/currencies', 'CurrencyController@index');

Route::middleware('auth:sanctum')->get('/transaction', 'TransactionController@index');
Route::middleware('auth:sanctum')->post('/transaction', 'TransactionController@store');
