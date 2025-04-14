<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name', 190);
            $table->char('CPF', 11)->unique();
            $table->date('nascimento');
            $table->string('professor', 190);
            $table->foreign('professor')->references('name')->on('professors');
            $table->string('senha', 190);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
