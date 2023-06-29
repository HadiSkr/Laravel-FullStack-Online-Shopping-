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
        Schema::create('departments', function (Blueprint $table) {
            $table->id('department_id');
            $table->longText('description');
            $table->string('type');
            $table->string('img');
            $table->string('name')->nullable();
            $table->string('keywords')->nullable();
            $table->tinyInteger('popular')-> default(0);
            $table->tinyInteger('status')-> default(0);
          //  $table->unsignedBigInteger('store_id');
           // $table->foreign('store_id')->references('store_id')->on('stores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
