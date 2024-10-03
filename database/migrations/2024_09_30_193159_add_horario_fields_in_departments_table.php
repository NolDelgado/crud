<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//TODO DOCUMENTAR CREACION DE MIGRACIONES
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            //! crear una columna de hora de inicio que no sea nullable
            $table->time('start_hour')->nullable(false);
            //! crear una columna de hora de fin que no sea nullable
            $table->time('end_hour')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            //! eliminar la columna de hora de inicio
            $table->dropColumn('start_hour');
            //! eliminar la columna de hora de fin
            $table->dropColumn('end_hour');
        });
    }
};
