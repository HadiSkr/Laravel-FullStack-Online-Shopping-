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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customerid');
            $table->timestamps();
            $table->boolean('role_as')->default(0);
            $table->string('firstname')->nullable();
            $table->string('lastname');
            $table->integer('phone')->unique()->nullable();
            $table->string('password');
            $table->string('image');
            $table->string('email')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
