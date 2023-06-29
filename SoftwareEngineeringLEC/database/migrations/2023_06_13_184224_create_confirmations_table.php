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
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('codeConfirmation');
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('checkone_id')->nullable();
            $table->foreign('checkone_id')->references('id')->on('check_ones')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('isPaid')->default(false);
            $table->unsignedBigInteger('paymentmethod_id')->nullable();
            $table->foreign('paymentmethod_id')->references('id')->on('payment_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->unsignedBigInteger('productdelivery_id')->nullable();
            $table->foreign('productdelivery_id')->references('id')->on('product_deliveries')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmations');
    }
};
