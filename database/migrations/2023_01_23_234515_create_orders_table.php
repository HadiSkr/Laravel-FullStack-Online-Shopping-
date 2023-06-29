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
        Schema::create('orders', function (Blueprint $table) {
            $table->id("orders_id");
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('country');
            $table->string('city');
            $table->string('address1');
            $table->string('address2');
            $table->string('email');
            $table->string('phone');
            $table->string('tracking_no');
            $table->tinyInteger('status')->default('0');
            $table->integer('total');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
