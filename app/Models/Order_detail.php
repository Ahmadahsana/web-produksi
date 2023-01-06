<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function status_pengerjaan()
    {
        return $this->belongsTo(Status_pengerjaan::class);
    }

    public function status_barang()
    {
        return $this->belongsTo(Status_barang::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function finishing()
    {
        return $this->hasOne(Prod_finishing::class);
    }

    public function jok()
    {
        return $this->hasOne(Prod_jok::class);
    }

    public function packing()
    {
        return $this->hasOne(Prod_packing::class);
    }

    public function pengiriman()
    {
        return $this->hasOne(Prod_kirim_barang::class);
    }

    public function mentahan()
    {
        return $this->hasOne(Prod_mentahan::class, 'Order_detail_id', 'id');
    }

    public function keuntungan()
    {
        return $this->hasOne(Prod_keuntungan::class);
    }

    public function Riwayat_pengerjaan()
    {
        return $this->hasMany(Riwayat_pengerjaan::class);
    }
}
