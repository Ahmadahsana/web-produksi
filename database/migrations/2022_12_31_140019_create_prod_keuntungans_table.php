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
        Schema::create('prod_keuntungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id');
            $table->integer('mentahan');
            $table->integer('finishing');
            $table->integer('jok');
            $table->integer('packing');
            $table->integer('pengiriman');
            $table->integer('total');
            $table->integer('harga_jual');
            $table->integer('keuntungan');
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
        Schema::dropIfExists('prod_keuntungans');
    }
};
