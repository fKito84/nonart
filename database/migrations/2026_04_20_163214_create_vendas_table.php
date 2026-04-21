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
            $table->foreignId('obra_id')->constrained()->onDelete('restrict'); 
            $table->integer('quantitat');
            $table->decimal('preu_unitat', 8, 2); 
            $table->decimal('total', 10, 2); 
            $table->enum('metode_pagament', ['efectiu', 'targeta', 'transferencia']); 
            $table->enum('estat', ['pendent', 'pagat', 'retornat'])->default('pendent'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
