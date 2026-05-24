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
        Schema::table('farm_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('location')->nullable();
            $table->string('field_size')->nullable();
            $table->string('primary_crop')->nullable();
            $table->string('soil_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farm_profiles', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'location', 'field_size', 'primary_crop', 'soil_type']);
        });
    }
};
