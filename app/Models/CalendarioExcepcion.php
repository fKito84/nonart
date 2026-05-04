<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarioExcepcion extends Model
{
    protected $table = 'calendario_excepcions';
    protected $fillable = ['data_excepcion', 'tancat'];
}