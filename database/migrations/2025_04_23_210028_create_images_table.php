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
        Schema::create('images', function (Blueprint $table) {
            $table->id('id_image')->primary();
            $table->string('fichier_image');
            $table->unsignedBigInteger('courrier_id')->nullable();
            $table->foreign('courrier_id')->references('id_courrier')->on('courrier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['courrier_id']);
            $table->dropColumn('courrier_id');
        });
    }
};
