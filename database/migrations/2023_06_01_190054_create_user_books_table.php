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
        Schema::create('user_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('livro_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('livro_id')->references('id')->on('books');
            $table->date('data_devolucao');
            $table->enum('situacao', [1, 2, 3])->default(1)->comment('1 - Emprestado, 2 - Devolvido, 3 - Atrasado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_books');
    }
};
