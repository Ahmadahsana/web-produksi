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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode_barang')->unique();
            $table->foreignId('status_barang_id');
            $table->foreignId('status_jual_id');
            $table->foreignId('kategori_barang_id');
            $table->string('foto')->nullable();
            $table->string('harga');
            $table->string('hpp');
            $table->string('satuan');
            $table->string('deskripsi');
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
        Schema::dropIfExists('barangs');
    }
};
