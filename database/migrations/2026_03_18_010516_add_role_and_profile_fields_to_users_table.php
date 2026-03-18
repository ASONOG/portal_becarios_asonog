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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role'))         $table->string('role')->default('becario')->after('remember_token');
            if (!Schema::hasColumn('users', 'phone'))        $table->string('phone')->nullable()->after('role');
            if (!Schema::hasColumn('users', 'national_id'))  $table->string('national_id')->nullable()->after('phone');
            if (!Schema::hasColumn('users', 'institution'))  $table->string('institution')->nullable()->after('national_id');
            if (!Schema::hasColumn('users', 'career'))       $table->string('career')->nullable()->after('institution');
            if (!Schema::hasColumn('users', 'bio'))          $table->text('bio')->nullable()->after('career');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'national_id', 'institution', 'career', 'bio']);
        });
    }
};
