<?php

use App\Models\Category;
use App\Models\Company;
use App\Models\County;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\RealestateStatus;
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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('title');
            $table->json('description');
            $table->unsignedBigInteger('sort')->default(1);
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Province::class)->index();
            $table->foreignIdFor(County::class)->index();
            $table->foreignIdFor(District::class)->index();
            $table->foreignIdFor(Company::class)->index();
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('net_area')->nullable();
            $table->unsignedInteger('gross_area')->nullable();
            $table->string('location')->default('41.0082, 28.9784');
            $table->string('status')->default(RealestateStatus::AVAILABLE->value);
            $table->string('3d_link')->nullable();
            $table->string('ad_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
