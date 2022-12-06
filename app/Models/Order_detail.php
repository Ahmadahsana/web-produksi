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

    public function header()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
