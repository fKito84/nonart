<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [ 'user_id', 'obra_id', 'preu_final', 'data_venda','estat_enviament' ];

    protected function casts(): array
    {
        return [
            'data_venda' => 'datetime',
        ];
    }

    // RELACIONS

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}