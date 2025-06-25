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
        Schema::create('courrier', function (Blueprint $table) {
            $table->id('id_courrier')->primary();
            $table->integer('nombre_courrier')->default(0);
            $table->string('nature_niveau');
            $table->longText('note_courrier')->nullable();
            $table->string('delai_courrier');
            $table->string('status_courrier')->comment('initial, traitement, termine, annule')->default('initial');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bureau_id')->nullable();
            $table->foreign('bureau_id')->references('id_bureau')->on('bureau');
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id')->references('id_categorie')->on('categorie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courrier');
        Schema::table('courrier', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'bureau_id', 'categorie_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('bureau_id');
            $table->dropColumn('categorie_id');
        });
    }
};
