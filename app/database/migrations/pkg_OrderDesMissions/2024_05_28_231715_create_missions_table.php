<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_mission');
            $table->string('nature')->nullable();
            $table->string('lieu');
            $table->string('type_de_mission');
            $table->integer('numero_ordre_mission');
            // date
            $table->date('data_ordre_mission');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->date('date_depart');
            $table->time('heure_de_depart');
            $table->date('date_return');
            $table->time('heure_de_return');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};