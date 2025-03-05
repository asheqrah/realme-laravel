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
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->string('shop_code');
            $table->string('area_name');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('imei');
            $table->boolean('is_settled');
            $table->dateTime('settled_at')->nullable();
            $table->foreignId('gift_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotteries');
    }
};
