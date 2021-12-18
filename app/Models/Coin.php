<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    public function purchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function sellOrder()
    {
        return $this->hasMany(SellOrder::class);
    }
}
