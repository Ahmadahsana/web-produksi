<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Status_barang()
    {
        return $this->belongsTo(Status_barang::class);
    }

    public function Status_jual()
    {
        return $this->belongsTo(Status_jual::class);
    }

    public function Kategori_barang()
    {
        return $this->belongsTo(Kategori_barang::class);
    }

    public function Transaksi_barang()
    {
        return $this->hasMany(Transaksi_barang::class, 'kode_barang', 'kode_barang');
    }
}
