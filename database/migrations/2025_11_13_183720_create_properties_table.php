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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained('cities')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('type'); // ['apartment', 'villa', 'shop', 'land', 'house']
            $table->integer('operation'); // ['sale', 'rent']
            $table->integer('rent_type')->nullable(); // ['daily', 'monthly']
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('area_m2')->nullable();
            $table->string('address')->nullable();
            $table->text('location_map',)->nullable();
            $table->json('extra')->nullable(); // for flexible meta (e.g., rooms, bathrooms)
            $table->integer('status')->default(0); // ['draft', 'active', 'hidden', 'sold', 'rented']
            $table->string('slug')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
