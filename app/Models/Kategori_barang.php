<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_barang extends Model
{
    use HasFactory;
    public function Barang()
    {
        return $this->hasMany(Barang::class);
    }
}
