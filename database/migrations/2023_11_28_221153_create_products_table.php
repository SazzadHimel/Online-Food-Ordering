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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->mediumText('description')->nullable();

            $table->integer('main_price');
            $table->integer('discounted_price');
            $table->integer('quantity');
            $table->tinyInteger('popular')->default('0')->comment('1=popular, 0=regular');
            $table->tinyInteger('status')->default('0')->comment('1=hidden, 0=visible');

            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->mediumText('meta_description');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
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
