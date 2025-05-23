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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->comment('Product thumbnail');
            $table->string('low_quality')->comment('Product low quality');
            $table->string('medium_quality')->comment('Product medium quality');
            $table->string('high_quality')->comment('Product high quality');
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
