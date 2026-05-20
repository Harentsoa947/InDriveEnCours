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
        Schema::create('requet_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('passager_id')
                ->nullable()
                ->nullOnDelete()
                ->constrained('users');
            
            $table->foreignId('chauffeur_id')
                ->nullable()
                ->nullOnDelete()
                ->constrained('users');

            $table->foreignId('trip_id')
            ->nullable()
            ->constrained('trips')
            ->nullOnDelete();

            $table->boolean('reponse_chauffeur')->nullable();

            $table->integer('prix_chauffeur')->nullable();
            
            $table->string('depart');
            $table->string('destination');
            $table->string('disTrajet');
            $table->string('prixProposer');
            $table->string('Chauf_Pass_Dis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requet_trips');
    }
};
