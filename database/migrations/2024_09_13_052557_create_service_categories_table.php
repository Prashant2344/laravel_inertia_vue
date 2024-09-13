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
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->default(0);
            $table->string('category_name')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active');

            $table->integer('order')->default(0);
            $table->decimal('average_pricing', 8, 2)->nullable();
            $table->integer('service_provider_count')->default(0);
            $table->boolean('is_popular')->default(false);
            $table->string('tagline')->nullable();
            $table->json('keywords')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->decimal('min_price', 8, 2)->nullable();
            $table->decimal('max_price', 8, 2)->nullable();
            $table->integer('service_count')->default(0);
            $table->text('category_rules')->nullable();
            $table->integer('duration_estimate')->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->decimal('additional_fees', 8, 2)->nullable();
            $table->boolean('is_taxable')->default(true);
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->integer('review_count')->default(0);
            $table->boolean('has_subcategories')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};
