<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'name', 'image_path'];

    public function item(){
        return $this->hasMany(Item::class,'category_id');
    }

}