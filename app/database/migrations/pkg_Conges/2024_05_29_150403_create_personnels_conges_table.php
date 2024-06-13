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
        Schema::create('personnels_conges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('personnel_id');
            $table->unsignedBiginteger('conges_id');
            $table->foreign('personnel_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('conges_id')->references('id')
                ->on('conges')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels_conges');
    }
};