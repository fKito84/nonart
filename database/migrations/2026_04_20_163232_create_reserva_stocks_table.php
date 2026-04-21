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
            $table->foreignId('reserva_id')->constrained('reserves_tallers')->onDelete('cascade'); // [cite: 120, 232, 316]
            $table->foreignId('stock_id')->constrained('stocks')->onDelete('restrict'); // [cite: 121, 233, 317]
            $table->integer('quantitat_consumida'); // [cite: 122, 234, 313]
            $table->timestamps();
            $table->unique(['reserva_id', 'stock_id'], 'unique_reserva_stock'); // [cite: 318]
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reservas_stocks');
    }
};
