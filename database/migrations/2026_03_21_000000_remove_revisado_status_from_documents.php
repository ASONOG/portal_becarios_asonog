<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Convert any 'revisado' documents to 'pendiente'
        DB::table('documents')
            ->where('status', 'revisado')
            ->update(['status' => 'pendiente']);
    }

    public function down(): void
    {
        // No action needed — 'revisado' can be re-added manually if reverted
    }
};
