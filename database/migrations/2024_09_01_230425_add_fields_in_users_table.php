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
            $table->string('phone')->nullable()->after('password'); // Campo de teléfono
            $table->string('fcm_code')->nullable()->after('phone'); // Campo de código FCM (Firebase Cloud Messaging)
            $table->string('career')->nullable()->after('fcm_code'); // Campo de carrera
            $table->string('semester')->nullable()->after('career'); // Campo de semestre
            $table->string('tuition')->nullable()->after('semester'); // Campo de número de cuenta
            $table->date('validity')->nullable()->after('tuition'); // Campo de vigencia
            $table->string('user_type')->nullable()->after('validity'); // Campo de tipo de usuario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'fcm_code',
                'career',
                'semester',
                'tuition',
                'validity',
                'user_type',
            ]);
        });
    }
};
