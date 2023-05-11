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


//        Marché : appel d’offre, numéro marché, exercice (année), type marché (depuis la table des types),
//date approbation, date notification approbation, date ordre service, délai d’exécution,
//responsable de suivi (depuis la base des utilisateurs),  montant (depuis le concurrent attributaire),
//prix révisable (booléen), délai garantie, date réception provisoire,  date réception définitive,
//date résiliation, motif résiliation, pièces jointes (l’import de multiple pièce jointes),
//attributaire, statut

        Schema::create('marches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('appel_doffre');
            $table->integer('numero_marche');
            $table->integer('exercice');
            $table->string('type_de_marche');
            $table->date('date_approbation');
            $table->date('date_notification_approbation');
            $table->date('date_ordre_service')->nullable();
            $table->string('delai_dexecution')->nullable();
            $table->string('responsable_de_suivi')->nullable();
            $table->string('montant')->nullable();
            $table->string('prix_revisable')->nullable();
            $table->string('delai_garantie')->nullable();
            $table->date('date_reception_provisoire')->nullable();
            $table->date('date_reception_definitive')->nullable();
            $table->date('date_resiliation')->nullable();
            $table->date('motif_resiliation')->nullable();
            $table->string('attributaire')->nullable();
            $table->string('statut');

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
