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
        Schema::create('movies_lib_has_movies_tags', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('movies_lib_id_movies_lib');
            $table->unsignedBigInteger('movies_lib_users_id_users'); //!Nota: Talvez isso seja inútil ¯\_(ツ)_/¯
            $table->unsignedBigInteger('movies_tags_id_movies_tags');
            $table->timestamp('created_at');

            //Foreign Keys
            $table->foreign('movies_lib_id_movies_lib')->references('id')->on('movies_libs');

            $table->foreign('movies_lib_users_id_users')->references('id')->on('users');
            $table->foreign('movies_tags_id_movies_tags')->references('id')->on('movies_tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*Schema::table('movies_lib_has_movies_tags', function(Blueprint $table){
            $table->dropForeign('movies_lib_id_movies_lib');
            $table->dropForeign('movies_lib_users_id_users');
            $table->dropForeign('movies_tags_id_movies_tags');
        });*/
        Schema::dropIfExists('movies_lib_has_movies_tags');
    }
};
