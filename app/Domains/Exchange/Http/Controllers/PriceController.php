<?php

namespace App\Domains\Exchange\Http\Controllers;

use App\Domains\Exchange\Exceptions\ExchangeNotFoundException;
use App\Domains\Exchange\Services\PriceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /** @var PriceService */
    protected $priceService;

    public function __construct(
        PriceService $priceService
    ) {
        $this->priceService = $priceService;
    }

    /**
     * Get the ask price for a certain exchange.
     */
    public function index(Request $request)
    {
        $request->validate([
            'from' => 'required|filled|string|exists:currencies,code',
            'to' => 'required|filled|string|exists:currencies,code',
        ]);
        try {
            $rate = $this->priceService->getAskPrice($request->from, $request->to);
            return $rate;
        } catch (ExchangeNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 404);
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
