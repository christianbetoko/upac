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
        Schema::table('admissions', function (Blueprint $table) {
            // Ajout des nouveaux champs après le champ 'birth_date'
            $table->string('national_id')->nullable()->after('birth_date')
              ;
                
            $table->string('birth_certificate')->nullable()->after('national_id')
              ;
                
            $table->string('good_conduct_certificate')->nullable()->after('birth_certificate')
               ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            // Suppression des colonnes en cas de rollback
            $table->dropColumn([
                'national_id',
                'birth_certificate',
                'good_conduct_certificate'
            ]);
        });
    }
};