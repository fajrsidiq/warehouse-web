<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    protected $fillable = ['item_name', 'stock_out_amount', 'weight', 'price', 'notes'];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'item_name', 'item_name');
    }
}
