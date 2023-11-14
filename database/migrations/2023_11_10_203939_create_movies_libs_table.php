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
        Schema::create('movies_libs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 60);
            $table->smallInteger('age_restriction');
            $table->integer('length_in_minutes'); //? Maybe useless
            $table->string('file', 100);
            $table->string('file_size');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');

            //foreign key
            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_libs');
    }
};
