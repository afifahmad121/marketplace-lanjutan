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
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->float('price', 12);
            $table->float('rating');
            $table->string('thumbnail', 100);
            $table->string('file_path', 100)->nullable();
            $table->integer('download_count')->nullable();
            $table->string('status', 100)->nullable();
            $table->foreignId('seller_id')->constrained('users');
            $table->foreignId('category_id')->constrained('product_categories');
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
