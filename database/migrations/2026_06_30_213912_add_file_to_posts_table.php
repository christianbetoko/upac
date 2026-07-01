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
        Schema::table('posts', function (Blueprint $table) {
            // Ajoute le champ file_path (nullable) pour stocker le chemin du fichier
            $table->string('file_path')
                ->nullable()
                ->after('content'); // Se place juste après la colonne du contenu (à ajuster selon tes colonnes)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Supprime la colonne en cas de rollback
            $table->dropColumn('file_path');
        });
    }
};