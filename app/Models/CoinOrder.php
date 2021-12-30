<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinOrder extends Model
{
    use HasFactory;

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
