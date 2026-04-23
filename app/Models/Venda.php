<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
     use HasFactory;
    protected $table = 'vendas';
    protected $fillable = ['user_id', 'quantitat_total', 'total_comanda', 'metode_pagament', 'estat'];

    public function detalls() 
    {
        return $this->hasMany(DetalleVenda::class, 'venda_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}