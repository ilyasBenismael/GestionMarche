<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('marches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('appel_doffre');
            $table->integer('numero_marche');
            $table->integer('exercice');
            $table->string('type_de_marche');
            $table->date('date_approbation')->nullable();
            $table->date('date_notification_approbation')->nullable();;
            $table->date('date_ordre_service')->nullable();
            $table->integer('delai_dexecution')->nullable();
            $table->string('responsable_de_suivi');
            $table->string('montant')->nullable();
            $table->string('prix_revisable')->nullable();
            $table->integer('delai_garantie')->nullable();
            $table->date('date_reception_provisoire')->nullable();
            $table->date('date_reception_definitive')->nullable();
            $table->date('date_resiliation')->nullable();
            $table->string('motif_resiliation')->nullable();
            $table->string('attributaire')->nullable();
            $table->string('statut');
            $table->string('date_reception_definitive_suggestion')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marches');
    }
};
