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
        Schema::create('shortlinks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // Nome/código do link curto
            $table->text('url');              // URL original
            $table->integer('clicks')->default(0); // Contador de cliques
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlinks');
    }
};
