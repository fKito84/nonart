<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('nom_material'); 
            $table->text('descripcio')->nullable(); 
            $table->integer('quantitat')->default(0); 
            $table->integer('quantitat_minima')->default(0); 
            $table->decimal('preu_unitat', 8, 2); 
            $table->string('proveidor')->nullable(); 
            // he afegit aquet camp per el material reutilitable com els caballets
            $table->boolean('reutilitzable')->default(false); 
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};