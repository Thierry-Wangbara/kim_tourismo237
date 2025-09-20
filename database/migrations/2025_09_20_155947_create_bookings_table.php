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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Touriste qui fait la réservation
            $table->foreignId('site_id')->constrained()->onDelete('cascade'); // Site réservé
            $table->date('visit_date'); // Date de visite souhaitée
            $table->time('visit_time')->nullable(); // Heure de visite
            $table->integer('visitors_count')->default(1); // Nombre de visiteurs
            $table->decimal('total_price', 10, 2)->nullable(); // Prix total
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed', 'rejected'])->default('pending');
            $table->text('special_requests')->nullable(); // Demandes spéciales
            $table->text('notes')->nullable(); // Notes du gestionnaire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
