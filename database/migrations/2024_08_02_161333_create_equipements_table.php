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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('equipement_id')->unique();
            $table->string('matricule')->unique();
            $table->string('nom')->nullable();
            $table->string('type');
            $table->string('marque');
            $table->string('modele');
            $table->string('numero_de_serie');
            $table->dateTime('date_achat');
            $table->enum('etat', ["bon_etat","en_reparation","endommage"]);
            $table->foreignId('emplacement_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
