<?php

namespace App\Domains\Exchange\Services;

use App\Domains\Exchange\Exceptions\ExchangeNotFoundException;
use App\Domains\Exchange\Models\Currency;
use App\Domains\Exchange\Models\Transaction;
use App\Domains\Wallet\Exceptions\InsufficientFundsException;
use App\Domains\Wallet\Services\WalletService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    /** @var PriceService */
    protected $priceService;

    /** @var WalletService */
    protected $walletService;

    public function __construct(
        PriceService $priceService,
        WalletService $walletService
    ) {
        $this->priceService = $priceService;
        $this->walletService = $walletService;
    }

    public function createTransaction(float $quantity, string $from, string $to, User $user)
    {
        $origin_currency = Currency::where('code', $from)->first();
        $target_currency = Currency::where('code', $to)->first();

        try {
            $rate = $this->priceService->getPrice($from, $to);
            $this->walletService->checkIfUserHasSufficientFunds($quantity, $origin_currency->id, $user);
        } catch (ExchangeNotFoundException $e) {
            throw $e;
        } catch (InsufficientFundsException $e) {
            throw $e;
        }

        $fee = $this->getTransactionFee($quantity);
        $bought = round(($quantity - $fee) * $rate, 2);

        try {
            DB::beginTransaction();
            $transaction = Transaction::create([
                'quantity' => $quantity,
                'fee' => $fee,
                'rate' => $rate,
                'bought' => $bought,
                'from' => $origin_currency->id,
                'to' => $target_currency->id,
                'user_id' => $user->id,
            ]);
            $this->walletService->addBoughtFundsToWallet($bought, $target_currency->id, $user);
            $this->walletService->removeFundsFromWallet($quantity, $origin_currency->id, $user);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return $transaction;
    }

    public function getTransactionFee(float $quantity)
    {
        return $quantity * 0.02;
    }
}
