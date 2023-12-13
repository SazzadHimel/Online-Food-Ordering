<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->Integer(['user_id']); // Remove unique constraint
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unique(['user_id', 'product_id']); // Restore unique constraint
        });
    }
};
