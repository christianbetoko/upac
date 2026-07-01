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
        Schema::table('enterprises', function (Blueprint $table) {
            // On ajoute le champ après une colonne existante (optionnel mais plus propre en BDD)
            $table->boolean('is_maintenance')
                ->default(false)
                ->after('website'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enterprises', function (Blueprint $table) {
            // En cas de "rollback", on supprime uniquement cette colonne
            $table->dropColumn('is_maintenance');
        });
    }
};