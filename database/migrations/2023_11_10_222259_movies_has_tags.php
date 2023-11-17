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
        Schema::create('movies_has_tags', function (Blueprint $table){
            $table->id();
            $table->foreignId('movies_lib_id_movies_lib')->constrained('movies');
            $table->foreignId('movies_lib_users_id_users')->constrained('users');//!Nota: Talvez isso seja inútil ¯\_(ツ)_/¯
            $table->foreignId('movie_tags_id_movies_tags')->constrained('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies_has_tags', function(Blueprint $table){
           $table->dropForeign(['movies_lib_id_movies_lib']);
           $table->dropForeign(['movies_lib_users_id_users']);
           $table->dropForeign(['movie_tags_id_movies_tags']);
        });
        Schema::dropIfExists('movies_has_tags');
    }
};
