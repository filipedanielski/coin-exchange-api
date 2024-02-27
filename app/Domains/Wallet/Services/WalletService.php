<?php

namespace App\Domains\Wallet\Services;

use App\Domains\Wallet\Exceptions\InsufficientFundsException;
use App\Domains\Wallet\Models\Wallet;
use App\Models\User;

class WalletService
{
    public function checkIfUserHasSufficientFunds(float $quantity, int $currency_id, User $user)
    {
        $wallet = Wallet::where('user_id', $user->id)
            ->where('currency_id', $currency_id)
            ->first();
        if (blank($wallet) || $wallet->quantity < $quantity) {
            throw new InsufficientFundsException();
        }
    }

    public function addBoughtFundsToWallet(float $bought, int $currency_id, User $user)
    {
        $wallet = Wallet::firstOrNew([
            'user_id' => $user->id,
            'currency_id' => $currency_id,
        ]);
        $wallet->quantity = $wallet->quantity + $bought;
        $wallet->save();
    }

    public function removeFundsFromWallet(float $quantity, int $currency_id, User $user)
    {
        $wallet = Wallet::where('user_id', $user->id)
            ->where('currency_id', $currency_id)
            ->first();
        $wallet->quantity = $wallet->quantity - $quantity;
        $wallet->save();
    }
}
