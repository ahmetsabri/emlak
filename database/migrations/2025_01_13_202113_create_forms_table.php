<?php

use App\Models\County;
use App\Models\Province;
use App\Models\RealEstate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('province')->nullable();
            $table->string('town')->nullable();
            $table->text('message')->nullable();
            $table->string('type');
            $table->string('attachment')->nullable();
            $table->string('real_state_type')->nullable();
            $table->string('rent_or_sell')->nullable();

            $table->foreignIdFor(RealEstate::class)->nullable()->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
