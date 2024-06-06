<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'stock_in_amount',
        'weight',
        'price',
        'notes',
        'type',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
