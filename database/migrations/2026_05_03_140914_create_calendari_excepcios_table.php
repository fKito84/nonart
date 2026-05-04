<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('calendario_excepcions', function (Blueprint $table) {
            $table->id();
            $table->date('data_excepcion')->unique(); 
            $table->boolean('tancat'); 
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('calendario_excepcions');
    }
};