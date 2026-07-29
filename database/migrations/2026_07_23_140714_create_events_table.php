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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // L'auteur
                      $table->string('title');
            $table->string('slug', 191)->unique();
            $table->longText('description');
            $table->string('image_cover')->nullable(); // Image principale
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
       
            $table->integer('views_count')->default(0); // Pour les stats de popularité
           
            $table->date('event_date')->nullable(); // Date de l'événement
            $table->time('event_start_time')->nullable(); // Heure de l'événement
            $table->time('event_end_time')->nullable(); // Heure de fin de l'événement
            $table->string('location')->nullable(); // Lieu de l'événement
           $table->decimal('ticket_price', 10, 2)->nullable();
           $table->enum('money',['USD','CDF','EUR'])->default('USD');
           $table->integer('available_tickets')->nullable();
            $table->boolean('is_online')->default(false); // Indique si l'événement est en ligne ou en personne
            $table->string('online_link')->nullable(); // 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
