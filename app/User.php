<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "user";
    
    protected $guarded = [];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orderProduct()
    {
        return $this->hasOne(OrderProduct::class, "user_id", "id");
    }

    public function scopeIsPetani($query)
    {
        return $this->query("role", 1);
    }

    public function scopeIsAdminPpl($query)
    {
        return $this->query("role", 2);
    }

    public function scopeIsAdminPenjualan($query)
    {
        return $this->query("role", 3);
    }

    public function scopeIsAdminKeuangan($query)
    {
        return $this->query("role", 4);
    }

    public function scopeIsSuperAdmin($query)
    {
        return $this->query("role", 5);
    }
}
