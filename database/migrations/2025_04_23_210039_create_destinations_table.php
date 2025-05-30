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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id('id_destination')->primary();
            $table->unsignedBigInteger('courrier_id')->nullable();
            $table->foreign('courrier_id')->references('id_courrier')->on('courrier');
            $table->unsignedBigInteger('bureau_id')->nullable();
            $table->foreign('bureau_id')->references('id_bureau')->on('bureau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropForeign(['courrier_id', 'bureau_id']);
            $table->dropColumn('courrier_id');
            $table->dropColumn('bureau_id');
        });
    }
};
