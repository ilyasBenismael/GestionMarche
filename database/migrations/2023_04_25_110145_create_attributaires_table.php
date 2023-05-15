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
        Schema::create('attributaires', function (Blueprint $table) {
            $table->id();
            $table->string("raison_sociale");
            $table->string("adresse");
            $table->string("compte_bancaire");
            $table->string("nom_banque");
            $table->string("registre_de_commerce");
            $table->string("ville_registre_de_commerce");
            $table->string("cnss");
            $table->string("ville_cnss");
            $table->string("patente");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributaires');
    }
};
