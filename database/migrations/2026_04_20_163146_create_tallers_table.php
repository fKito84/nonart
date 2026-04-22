<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tallers', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); 
            $table->text('descripcio')->nullable();
            $table->enum('tecnica', ['oleo', 'acrilica', 'aquarela','false'])->default('false'); ; 
            $table->decimal('duracio_hores', 8, 2);
            $table->integer('capacitat_minima')->default(8);
            $table->integer('capacitat_max'); 
            $table->decimal('preu', 8, 2); 
            $table->boolean('actiu')->default(true); 
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('tallers');
    }
};