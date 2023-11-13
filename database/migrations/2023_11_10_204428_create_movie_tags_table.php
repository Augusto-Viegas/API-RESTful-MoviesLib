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
        Schema::create('movies_tags', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('drama');
            $table->string('horror');
            $table->string('comedy');
            $table->string('thriller');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_tags');
    }
};
