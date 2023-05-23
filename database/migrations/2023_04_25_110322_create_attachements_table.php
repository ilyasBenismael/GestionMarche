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
        Schema::create('attachements', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->integer("marche");
            $table->integer("numero");
            $table->integer("montant_de_revision");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //---- Calling Table Marche ----
        //Schema::table('categorie_prixes', function (Blueprint $table) {
        //    $table->dropForeign(['marche_id']);
        //});
        //---- Calling Table Marche ----
        Schema::dropIfExists('attachements');
    }
};
