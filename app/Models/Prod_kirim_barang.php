<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod_kirim_barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Order_detail()
    {
        return $this->belongsTo(Order_detail::class);
    }

    public function Vendor_produksi()
    {
        return $this->belongsTo(Vendor_produksi::class);
    }
}
