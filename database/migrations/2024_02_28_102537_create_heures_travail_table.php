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
        Schema::create('heures_travail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->dateTime('heure_entree');
            $table->dateTime('heure_sortie')->nullable();
            $table->timestamps();

            // Clé étrangère vers la table des employés
            $table->foreign('employe_id')->references('id')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heures_travail');
    }
};
