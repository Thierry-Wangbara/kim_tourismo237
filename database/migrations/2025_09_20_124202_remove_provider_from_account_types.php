<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mettre à jour les utilisateurs avec le type 'provider' vers 'tourist'
        DB::table('users')
            ->where('account_type', 'provider')
            ->update(['account_type' => 'tourist']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cette migration ne peut pas être annulée car nous avons supprimé le type 'provider'
    }
};
