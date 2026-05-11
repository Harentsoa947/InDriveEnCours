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
        // Seul Le super admin a acces à cela
        Schema::create('type_voitures', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            // définit à partir du type
            $table->string('description_voiture');
            $table->string('usage_passager');
            $table->integer('nbr_passager');
            // bagage: petit, moyen, beaucoup
            $table->integer('bagage');
            // $table->boolean('electrique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_voitures');
    }
};
