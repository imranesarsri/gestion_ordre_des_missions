<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('transport_utiliser');
            $table->string('marque')->nullable();
            $table->string('puissance_fiscal')->nullable();
            $table->string('numiro_plaque')->nullable();
            $table->integer('user');
            $table->unsignedBigInteger('moyens_transports_id');
            $table->foreign('moyens_transports_id')->references('id')->on('moyens_transports')->onDelete('cascade');
            $table->unsignedBigInteger('mission_id');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};