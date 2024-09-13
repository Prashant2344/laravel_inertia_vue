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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('service_type')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('availability', ['available', 'unavailable'])->default('available');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->integer('reviews_count')->default(0);
            $table->integer('experience_years')->nullable();
            $table->json('service_areas')->nullable();
            $table->string('specialization')->nullable();
            $table->string('license_number')->nullable();
            $table->json('certifications')->nullable();
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->integer('completed_jobs_count')->default(0);
            $table->json('availability_schedule')->nullable();
            $table->string('payment_method')->nullable();
            $table->date('joined_date')->nullable();
            $table->dateTime('last_active_date')->nullable();
            $table->decimal('service_commission', 5, 2)->default(0);
            $table->string('tax_id')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->json('languages_spoken')->nullable();
            $table->string('service_plan')->nullable();
            $table->json('bank_details')->nullable();
            $table->json('documents_uploaded')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->integer('feedback_response_time')->default(0);
            $table->json('portfolio')->nullable();
            $table->json('vehicle_details')->nullable();
            $table->json('insurance_details')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
