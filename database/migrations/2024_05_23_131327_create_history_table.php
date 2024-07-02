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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Apartment::class);
            $table->foreignIdFor(\App\Models\User::class); //this is a class generated by starterKit
//            $table->date('booking_date');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('deposit');
            $table->integer('status');
//            $table->date('reservation_create');
//            $table->date('booking_last_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};