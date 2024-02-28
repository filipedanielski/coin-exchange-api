<?php

namespace App\Domains\Wallet\Http\Controllers;

use App\Domains\Wallet\Http\Requests\StoreWalletRequest;
use App\Domains\Wallet\Models\Wallet;
use App\Domains\Wallet\Services\WalletService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    /** @var WalletService */
    protected $walletService;

    public function __construct(
        WalletService $walletService
    ) {
        $this->walletService = $walletService;
    }

    /**
     * Returns a user's funds on their wallets.
     */
    public function index(Request $request)
    {
        try {
            $wallets = Wallet::with('currency')->where('user_id', $request->user()->id)->get();
            if (blank($wallets) || $wallets->isEmpty()) {
                return response()->json([
                    'error' => 'Nenhum fundo encontrado na carteira.',
                ], 404);
            }

            return $wallets;
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
     * Add BRL funds to user's wallet.
     */
    public function store(StoreWalletRequest $request)
    {
        try {
            $this->walletService->addBoughtFundsToWallet($request->quantity, $request->currency_id, $request->user());

            return response()->json([
                'success' => 'Fundos adicionados com sucesso.',
            ], 200);
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
