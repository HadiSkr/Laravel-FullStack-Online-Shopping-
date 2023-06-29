<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singleorders', function (Blueprint $table) {
            $table->id('singleorder_id');
            $table->integer('price');
            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('productid');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('orders_id')->references('orders_id')->on('orders')->onDelete('cascade');
            $table->foreign('productid')->references('productid')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singleorders');
    }
};
