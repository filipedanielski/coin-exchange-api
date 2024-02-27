<?php

namespace App\Domains\Exchange\Http\Controllers;

use App\Domains\Exchange\Models\Currency;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $currencies = Currency::whereNot('id', Currency::BRL)->get();
            if (blank($currencies) || $currencies->isEmpty()) {
                return response()->json([
                    'error' => 'Nenhuma moeda estrangeira foi encontrada.',
                ], 404);
            }

            return $currencies->toJson();
        } catch (\Exception $e) {
            Log::error($e, [
                'exception_code' => $e->getCode(),
            ]);

            return response()->json([
                'error' => 'Erro interno, tente novamente ou mais tarde. (Código do Erro: '.$e->getCode().')',
            ], 500);
        }
    }
}
