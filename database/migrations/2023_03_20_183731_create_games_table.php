<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
    
        Schema::create('games', function (Blueprint $table) {
          
            $table->id('game_id');
           
            $table->string('title', 120);
            $table->date('release_date');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->string('cover', 255)->nullable();
            $table->string('cover_description', 255)->nullable();
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
