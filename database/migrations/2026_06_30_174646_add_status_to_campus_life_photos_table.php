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
        Schema::table('campus_life_photos', function (Blueprint $table) {
            // Ajoute le champ status (vrai par défaut) après le chemin de l'image
            $table->boolean('status')
                ->default(true)
                ->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campus_life_photos', function (Blueprint $table) {
            // Supprime la colonne en cas de rollback
            $table->dropColumn('status');
        });
    }
};