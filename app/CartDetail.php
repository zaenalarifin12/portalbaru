<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = "cart_detail";
    
    protected $guarded = [];

    public function cartProduct()
    {
        return $this->belongsTo(CartProduct::class, "cart_id", "id");
    }

}
