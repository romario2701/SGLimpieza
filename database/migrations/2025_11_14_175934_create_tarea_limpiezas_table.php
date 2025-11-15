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
        Schema::create('tarea_limpiezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users');
            $table->foreignId('personal_id')->nullable()->constrained('users');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('pendiente');
            $table->string('prioridad')->default('baja');
            $table->timestamp('completado_el')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_limpiezas');
    }
};
