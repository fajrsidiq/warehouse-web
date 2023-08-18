<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    protected $fillable = ['item_name', 'stock_in_amount', 'price', 'notes'];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'item_name', 'item_name');
    }
}
