<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function Order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }
}
