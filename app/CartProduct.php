<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = "cart_product";
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class, "cart_id", "id");
    }

    public function products()
    {
        return $this->belongToMany(Product::class, "cart", "id");
    }
    
}
