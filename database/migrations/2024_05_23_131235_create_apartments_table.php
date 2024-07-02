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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('rooms');
            $table->integer('square_feet');
            $table->integer('floor');
            $table->integer('number_of_persons');
            $table->string("location");
            $table->string('picture');
            $table->integer('original_price');
            $table->integer('price_per_night');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
