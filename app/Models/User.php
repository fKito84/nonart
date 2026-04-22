<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * 
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email','password', 'phone', 'role',  ];

    
     // atributos que deben estar ocultos 
     
     // @var list<string>
     
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     *
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function reserva_tallers()
    {
        
        return $this->hasMany(ReservaTaller::class);
    }

    public function compras()
    {
        return $this->hasMany(Venda::class);
    }
}