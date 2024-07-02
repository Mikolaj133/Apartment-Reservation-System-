<?php

use App\Models\Apartment;
use App\Models\User;
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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Apartment::class);
            $table->foreignIdFor(User::class);
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('deposit'); //new
            $table->enum('status' , ['pending' , 'confirmed' , 'canceled']); //new
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
