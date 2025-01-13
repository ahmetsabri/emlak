<?php

use App\Models\Feature;
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
        Schema::create('feature_real_estate', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Feature::class)->index();
            $table->foreignIdFor(RealEstate::class)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_real_estate');
    }
};
