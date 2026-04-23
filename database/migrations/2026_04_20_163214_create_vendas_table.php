<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->integer('quantitat_total'); // Suma de todos los artículos
            $table->decimal('total_comanda', 10, 2); // Precio total pagado
            $table->enum('metode_pagament', ['efectiu', 'targeta', 'transferencia']);
            $table->enum('estat', ['pendent', 'pagat', 'anulat'])->default('pendent');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
