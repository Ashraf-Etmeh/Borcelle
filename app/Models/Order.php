<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_order')
            ->using(ItemOrder::class)
            ->withPivot('price');
    }

    public function copon()
    {
        return $this->hasOne(Copon::class, 'copon_id');
    }
}
