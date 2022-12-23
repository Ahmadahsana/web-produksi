<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_produksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Prod_finishing()
    {
        return $this->hasMany(Prod_finishing::class);
    }
}
