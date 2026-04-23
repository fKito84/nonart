<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {
        Schema::create('detalles_venda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('vendas')->onDelete('cascade');
            $table->enum('tipus_article', ['obra', 'taller']);
            $table->unsignedBigInteger('article_id');
            $table->integer('quantitat');
            $table->decimal('preu_unitat', 8, 2);
            $table->decimal('subtotal', 10, 2); 
            
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('detalles_venda');
    }
};
