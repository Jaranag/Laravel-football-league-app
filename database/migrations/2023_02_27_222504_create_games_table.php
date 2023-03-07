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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('local_team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreignId('away_team_id')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');;
            $table->integer('local_goals')->default(0);
            $table->integer('away_goals')->default(0);
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
