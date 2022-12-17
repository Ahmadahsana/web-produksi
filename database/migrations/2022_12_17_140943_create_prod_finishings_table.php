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
        Schema::create('prod_finishings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id');
            $table->foreignId('vendor_produksi_id')->nullable();
            $table->integer('biaya')->nullable();
            $table->integer('is_selesai')->nullable();
            $table->integer('jumlah_finishing')->nullable();
            $table->integer('jumlah_service')->nullable();
            $table->integer('harga_finishing')->nullable();
            $table->integer('harga_service')->nullable();
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
        Schema::dropIfExists('prod_finishings');
    }
};
