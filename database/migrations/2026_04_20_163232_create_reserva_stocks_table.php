<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservas_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reserva_id')->constrained('reserva_talleres')->onDelete('cascade');
            $table->foreignId('stock_id')->constrained('stocks')->onDelete('restrict');
            $table->integer('quantitat_consumida'); 
            $table->timestamps();
            $table->unique(['reserva_id', 'stock_id'], 'unique_reserva_stock'); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reservas_stocks');
    }
};
