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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onDelete('cascade');

            $table->foreignId('driver_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete();
            
            $table->string('depart');
            $table->string('destination');
            $table->string('prix');
            $table->string('status');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};


// ✔️ foreignId('user_id')->constrained('users')

// 👉 dit à Laravel :

// “user_id doit exister dans la table users”


// ✔️ onDelete('cascade')
// 👉 si un utilisateur est supprimé :
// ses trips sont supprimés aussi


// ✔️ nullOnDelete()
// 👉 si un chauffeur est supprimé :
// la course reste, mais sans driver