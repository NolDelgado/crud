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
        Schema::create('accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qr_code_id')->constrained();
            $table->integer('access_type');
            $table->timestamp('university_arrival'); 
            $table->timestamp('department_arrival')->nullable();
            $table->timestamp('department_departure')->nullable();
            $table->timestamp('university_departure');
            $table->boolean('closed_by_system')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesses');
    }
};
