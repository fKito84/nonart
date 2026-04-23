<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reserva_talleres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict'); 
            $table->foreignId('taller_id')->constrained('tallers')->onDelete('restrict'); 
            $table->integer('personas_reserva')->default(1);
            $table->dateTime('data_taller'); 
            $table->enum('estat', ['pendent', 'confirmada', 'cancel.lada'])->default('pendent'); 
            $table->text('notes')->nullable(); 
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('reserva_talleres');
    }
};
