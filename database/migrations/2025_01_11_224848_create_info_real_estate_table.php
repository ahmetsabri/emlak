<?php

use App\Models\Info;
use App\Models\RealEstate;
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
        Schema::create('info_real_estate', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Info::class)->index();
            $table->foreignIdFor(RealEstate::class)->index();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_real_estate');
    }
};
