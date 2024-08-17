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
        Schema::create('organisation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('phone_second');
            $table->string('organisation_phone');
            $table->string('email');
            $table->string('address');
            $table->string('wp_contact');
            $table->string('logo');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('youtube');
            $table->string('x');
            $table->string('app_store');
            $table->string('play_store');
            $table->string('working_hours');
            $table->string('maps');
            $table->integer('student_number');
            $table->integer('teacher_number');
            $table->integer('vehicle_number');
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
