<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   
    protected $fillable = ['name', 'email','password', 'phone', 'role'  ];

    
 
   //dades ocultes  
    protected $hidden = [
        'password',
        'remember_token',
    ];

  
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }
    public function compras()
    {
        return $this->hasMany(Venda::class, 'user_id');
    }

    public function reserva_tallers()
    {
        return $this->hasMany(ReservaTaller::class, 'user_id');
    }
}