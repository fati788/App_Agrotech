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
        Schema::create('tipo_cultivos', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->string('nombre_cientifico');
            $table->string('familia');
            $table->enum('ciclo' , ['anual', 'bianual', 'perenne']);
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_cultivos');
    }
};
