<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copon extends Model
{
    use HasFactory;

    protected $fillable = ['copon', 'persentage', 'max']

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'copon_id');
    }
}
