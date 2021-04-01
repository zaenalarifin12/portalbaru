<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        protected $table = "admin";

        protected $guard = 'admin';

        protected $fillable = [
            'nama', 'username', 'role', "password"
        ];

        public $timestamps = false;


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