<?php

Route::middleware('auth:sanctum')->get('/', 'WalletController@index');
Route::middleware('auth:sanctum')->post('/', 'WalletController@store');
