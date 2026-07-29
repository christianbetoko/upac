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
        Schema::create('event_speakers', function (Blueprint $table) {
            $table->id();
           
            $table->string('name');
            $table->string('title')->nullable(); // Titre ou rôle du conférencier
            $table->string('image')->nullable(); // Image du conférencier
            $table->text('bio')->nullable(); // Biographie du conférencier
            $table->string('linkedin')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('twitter')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('facebook')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('instagram')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('tiktok')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('youtube')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('email')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->string('phone')->nullable(); // Liens vers les réseaux sociaux du conférencier (JSON ou chaîne de caractères)
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_speakers');
    }
};
