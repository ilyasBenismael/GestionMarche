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
        Schema::create('quantite_executes', function (Blueprint $table) {
            $table->id();
            $table->integer("prix");
            $table->integer("quantite");
            $table->integer("attachement");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //---- Calling Table Prixe ----
        //Schema::table('quantite_executes', function (Blueprint $table) {
        //    $table->dropForeign(['prix_id']);
        //});
        //---- Calling Table Prixe ----
        Schema::dropIfExists('quantite_executes');
    }
};
