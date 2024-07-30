<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('quantity');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Agrega la opción de eliminación en cascada

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
