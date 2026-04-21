<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); 
            $table->text('descripcion')->nullable(); 
            $table->string('tecnica', 100);
            $table->string('medidas', 50)->nullable();
            $table->decimal('precio', 8, 2);
            $table->string('coleccion')->default('sin coleccion');
            $table->boolean('disponible')->default(true); 
            $table->string('imagen', 500)->nullable();
            $table->timestamps(); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
