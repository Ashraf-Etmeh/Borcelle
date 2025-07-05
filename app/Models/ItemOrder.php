<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemOrder extends Pivot
{
    protected $fillable = ['item_id', 'order_id', 'price'];

    
}
