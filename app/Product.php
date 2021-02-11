<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    
    protected $guarded = [];

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class, "product_id", "id");
    }
}
