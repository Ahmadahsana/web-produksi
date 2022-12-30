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
        Schema::create('prod_packings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id');
            $table->foreignId('vendor_produksi_id')->nullable();
            $table->integer('biaya')->nullable();
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
        Schema::dropIfExists('prod_packings');
    }
};
