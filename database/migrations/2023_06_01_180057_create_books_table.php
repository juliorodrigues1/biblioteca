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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('autor');
            $table->integer('numero_registro')->nullable();
            $table->enum('situacao', [1, 2])->default(1)->comment('1 - Disponível, 2 - Emprestado');
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
