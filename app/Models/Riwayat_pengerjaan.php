<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_pengerjaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Order_detail()
    {
        return $this->belongsTo(Order_detail::class);
    }
    public function Status_pengerjaan()
    {
        return $this->belongsTo(Status_pengerjaan::class);
    }
}
