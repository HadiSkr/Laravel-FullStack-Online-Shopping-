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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productid');
           // $table->unsignedBigInteger('store_id');
            $table->timestamps();
            $table->longText('Specification');
            $table->longText('disc');
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->string('quantity');
            $table->string('keys');
            $table->string('name');
            $table->string('image');
            $table->tinyInteger('status')-> default(0);
            $table->tinyInteger('trending')-> default(0);
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
           // $table->foreign('store_id')->references('store_id')->on('stores')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
