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
        Schema::create('prod_kirim_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id');
            $table->integer('biaya_pengiriman')->nullable();
            $table->integer('biaya_perakitan')->nullable();
            $table->integer('biaya_service')->nullable();
            $table->integer('biaya_total')->nullable();
            $table->dateTime('tgl_diproses')->nullable();
            $table->integer('is_selesai')->nullable();
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
        Schema::dropIfExists('prod_kirim_barangs');
    }
};
