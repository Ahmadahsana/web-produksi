<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_pengerjaan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Riwayat_pengerjaan()
    {
        return $this->hasMany(Riwayat_pengerjaan::class);
    }
}
