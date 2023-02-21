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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('chain_id')->nullable();
            $table->string('chain_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_filename')->nullable();
            $table->string('country_name')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('facilities')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('hotel_filename')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_post_code')->nullable();
            $table->unsignedInteger('image_id')->nullable();
            $table->text('images')->nullable();
            $table->unsignedDouble('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedDouble('min_rate')->nullable();
            $table->string('place_filename')->nullable();
            $table->unsignedInteger('place_id')->nullable();
            $table->string('place_name')->nullable()->index();
            $table->string('place_type')->nullable();
            $table->unsignedInteger('popularity')->nullable();
            $table->string('property_type')->nullable();
            $table->unsignedInteger('property_type_id')->nullable();
            $table->unsignedInteger('star_rating')->nullable();
            $table->string('state_name')->nullable();
            $table->string('state_place_filename')->nullable();
            $table->string('state_place_id')->nullable();
            $table->string('themes')->nullable();
            $table->string('trademarked')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
