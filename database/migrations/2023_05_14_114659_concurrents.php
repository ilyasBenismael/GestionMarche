<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concurrents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('appeloffres_id');; // Foreign key

            $table->string('nom');
            $table->string('ville');
            $table->string('montant');
            $table->string('statut');
            $table->timestamps();


            $table->foreign('appeloffres_id')->references('id')->on('appeloffres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
