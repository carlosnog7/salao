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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id'
            $table->string('nome'); // Adiciona a coluna 'nome'
            $table->string('email')->unique(); // Adiciona a coluna 'email' e a torna única
            // Adicione mais colunas conforme necessário
            $table->timestamps(); // Adiciona as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios'); // Remove a tabela 'usuarios' se existir
    }
};
