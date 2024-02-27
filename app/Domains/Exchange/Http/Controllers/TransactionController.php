<?php

namespace App\Domains\Exchange\Http\Controllers;

use App\Domains\Exchange\Exceptions\ExchangeNotFoundException;
use App\Domains\Exchange\Http\Requests\StoreTransactionRequest;
use App\Domains\Exchange\Models\Transaction;
use App\Domains\Exchange\Services\TransactionService;
use App\Domains\Wallet\Exceptions\InsufficientFundsException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /** @var TransactionService */
    protected $transactionService;

    public function __construct(
        TransactionService $transactionService,
    ) {
        $this->transactionService = $transactionService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $transactions = Transaction::with('fromCurrency', 'toCurrency')->where('user_id', $request->user()->id)->get();
            if (blank($transactions) || $transactions->isEmpty()) {
                return response()->json([
                    'error' => 'Nenhuma transação encontrada.',
                ], 404);
            }

            return $transactions;
        } catch (\Exception $e) {
            Log::error($e, [
                'user_id' => $request->user()->id,
                'exception_code' => $e->getCode(),
            ]);

            return response()->json([
                'error' => 'Erro interno, tente novamente ou mais tarde. (Código do Erro: '.$e->getCode().')',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        try {
            $transaction = $this->transactionService->createTransaction(
                $request->quantity,
                $request->from,
                $request->to,
                $request->user(),
            );

            return response()->json([
                'success' => 'Transação realizada com sucesso.',
                'transaction_id' => $transaction->id,
            ], 200);
        } catch (InsufficientFundsException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 403);
        } catch (ExchangeNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 404);
        } catch (\Exception $e) {
            Log::error($e, [
                'user_id' => $request->user()->id,
                'exception_code' => $e->getCode(),
            ]);

            return response()->json([
                'error' => 'Erro interno, tente novamente ou mais tarde. (Código do Erro: '.$e->getCode().')',
            ], 500);
        }
    }
}
