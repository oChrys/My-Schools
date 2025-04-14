<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name', 190);
            $table->char('CPF', 11)->unique();
            $table->date('nascimento');
            $table->string('escola', 190);
            $table->foreign('escola')->references('name')->on('escola');
            $table->string('senha', 190);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
