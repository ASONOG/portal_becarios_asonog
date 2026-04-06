<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_transfer_donations', function (Blueprint $table) {
            $table->id();
            $table->string('donor_name');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('HNL');
            $table->string('bank_name');
            $table->string('receipt_path');
            $table->string('receipt_name');
            $table->string('status')->default('pendiente'); // pendiente, verificado, rechazado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_transfer_donations');
    }
};
