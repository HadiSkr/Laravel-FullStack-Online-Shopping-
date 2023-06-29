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
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('description');
            $table->string('features');
            $table->string('eval');
            $table->string('image');
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
