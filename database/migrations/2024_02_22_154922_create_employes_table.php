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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone');
            $table->string('fonction');
            $table->unsignedBigInteger('type_contrat_id');
            $table->date('date_debut');
            $table->string('photo')->nullable();
            $table->timestamps();

            // Ajoute la clé étrangère
            $table->foreign('type_contrat_id')->references('id')->on('type_contrats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
