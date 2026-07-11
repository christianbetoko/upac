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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            // 1. Informations Personnelles
            $table->string('code',191)->unique(); // Code unique pour chaque admission
            $table->string('photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('gender', ['M', 'F']); // Limité aux options Masculin / Féminin de ton select
            $table->date('birth_date');


            //Informations scolaires
$table->string('school_name');
$table->string('school_option');
$table->string('school_grad_year');
$table->string('school_percentage');
$table->string('school_file')->nullable();
$table->string('university_name')->nullable();
$table->string('university_option')->nullable();
$table->string('university_grad_year')->nullable();

$table->string('university_mention')->nullable();
$table->string('university_percentage')->nullable();
$table->string('university_file')->nullable();

            // 2. Choix Académiques (Clés étrangères)
            // On lie l'admission à un département (Filière)
            $table->foreignId('department_id')
                  ->constrained()
                  ->onDelete('cascade');
                  
            // On lie l'admission à un niveau ciblé
            $table->foreignId('level_id')
                  ->constrained()
                  ->onDelete('cascade');
                  
           
            
            // Suivi et Horodatage
            $table->enum('status',['pending', 'approved', 'rejected'])->default('pending'); // Permet de gérer l'état (pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
