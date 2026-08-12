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
            // Statut du paiement avec valeur par défaut 'pending'
            $table->enum('payment_status', ['pending', 'paid', 'failed'])
                  ->default('pending')
                  ->after('status');

            // Référence orderNumber retournée par FlexPaie (nécessaire pour le suivi)
            $table->string('order_number')
                  ->nullable()
                  ->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropColumn(['payment_status', 'order_number']);
        });
    }
};