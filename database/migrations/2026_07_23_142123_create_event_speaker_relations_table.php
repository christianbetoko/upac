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
        Schema::create('event_speaker_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('speaker_id')->constrained('event_speakers')->onDelete('cascade');
            $table->enum('role', ['keynote', 'panelist', 'moderator', 'guest'])->default('guest'); // Rôle du conférencier dans l'événement
            $table->boolean('status')->default(true); // Statut de la relation (active/inactive)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_speaker_relations');
    }
};
