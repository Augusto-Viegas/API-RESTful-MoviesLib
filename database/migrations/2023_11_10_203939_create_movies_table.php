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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name', 60);
            $table->smallInteger('age_restriction');
            $table->integer('length_in_minutes'); //? Maybe useless
            $table->string('file', 100);
            $table->string('file_size');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function(Blueprint $table){
           $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('movies');
    }
};
