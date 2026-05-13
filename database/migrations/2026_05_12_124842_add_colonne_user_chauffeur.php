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
        Schema::table('users', function (Blueprint $table) {
            $table->string('marque_voiture')->nullable()->after('role');
            $table->integer('electrique')->nullable()->after('marque_voiture');
            $table->foreignId('position_chauffeur_id')
                    ->nullable()
                    ->constrained('localisation_chauffeurs')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('type_voitures_id')
                    ->nullable()
                    ->constrained('type_voitures')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    // ->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn(['marque_voiture', 'type_voitures_id']);
        });
    }
};
