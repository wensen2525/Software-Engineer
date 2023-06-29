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
        Schema::create('check_ones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('totalPriceProduct')->nullable();
            $table->integer('quantity');
            $table->boolean('isPaid')->default(false);
            $table->unsignedBigInteger('size_id')->default(1);
            $table->foreign('size_id')->references('id')->on('sizes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('color_id')->default(1);
            $table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ones');
    }
};
