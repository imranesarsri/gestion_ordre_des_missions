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
        Schema::create('jour_feries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('annee_juridique_id');
            $table->string('nom');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('is_formateur');
            $table->boolean('is_administrateur');
            $table->foreign('annee_juridique_id')->references('id')
            ->on('annee_juridiques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jour_feries');
    }
};
