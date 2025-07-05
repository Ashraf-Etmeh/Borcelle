<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['seats_num'];

    public function tables()
    {
        return $this->hasMany(Table::class, 'reservation_id');
    }
}
