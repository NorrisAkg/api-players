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
        Schema::create('players', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary()->nullable(false);
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('jersey_number')->unique;
            $table->string('picture')->nullable();
            $table->foreignId('position_id')->constrained('positions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
