<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->id();

            // Datos personales
            $table->string('email');
            $table->string('full_name');
            $table->string('phone');
            $table->string('department');
            $table->string('municipality');

            // Perfil académico
            $table->string('academic_level');
            $table->string('academic_level_other')->nullable();
            $table->string('institution');
            $table->string('field_of_study');
            $table->string('semester')->nullable();
            $table->boolean('requires_agreement')->nullable();

            // Modalidad de interés
            $table->string('internship_type');
            $table->string('availability');
            $table->date('available_from')->nullable();
            $table->string('estimated_duration');

            // Motivación
            $table->text('motivation');
            $table->boolean('has_community_experience')->nullable();
            $table->string('source')->nullable();
            $table->string('source_other')->nullable();

            // Documento adjunto
            $table->string('cv_path')->nullable();

            // Control administrativo
            $table->string('status')->default('pendiente'); // pendiente, revisada, aceptada, rechazada
            $table->text('admin_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internship_applications');
    }
};
