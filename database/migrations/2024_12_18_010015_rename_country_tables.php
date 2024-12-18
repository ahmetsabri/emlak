<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::unprepared(file_get_contents(public_path('a.sql')));

        Schema::rename('iller', 'provinces');
        Schema::rename('ilceler', 'counties');
        Schema::rename('mahalleler', 'districts');

        Schema::table('provinces', function (Blueprint $table) {
            $table->renameColumn('il_adi', 'name');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->renameColumn('mahalle_adi', 'name');
        });

        Schema::table('counties', function (Blueprint $table) {
            $table->renameColumn('il_id', 'province_id');
            $table->renameColumn('ilce_adi', 'name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
