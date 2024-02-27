<?php

namespace App\Domains\Exchange\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'fee',
        'rate',
        'bought',
        'from',
        'to',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'from');
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to');
    }
}
