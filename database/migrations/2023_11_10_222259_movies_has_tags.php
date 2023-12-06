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
        Schema::create('movie_tag', function (Blueprint $table){
            $table->id();

            $table->foreignId('movie_id')
                ->constrained('movies')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreignId('tag_id')
                ->constrained('tags')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movie_tag', function(Blueprint $table){
           $table->dropForeign(['movie_id']);
           $table->dropForeign(['tag_id']);
        });
        Schema::dropIfExists('movie_tag');
    }
};
