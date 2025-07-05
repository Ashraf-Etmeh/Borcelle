<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=['name','description','price','calories','ingrediants','discount'];
    // protected $guarded=[];

    public function images()
    {
        return $this->hasMany(Item_Image::class,'item_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'item_order')
            ->using(ItemOrder::class)
            ->withPivot('price');
    }
}
