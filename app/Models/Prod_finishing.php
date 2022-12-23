<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod_finishing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Vendor_produksi()
    {
        return $this->belongsTo(Vendor_produksi::class);
    }
}
