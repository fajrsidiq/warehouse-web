<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['item_name', 'stock_amount', 'weight'];

    public $timestamps = false;
    
    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'item_name', 'item_name');
    }

    public function stockOuts()
    {
        return $this->hasMany(StockOut::class, 'item_name', 'item_name');
    }
}
