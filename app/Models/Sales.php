<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'prov_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'kota', 'city_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'dis_id');
    }

    public function Order()
    {
        return $this->hasOne(Order::class);
    }
}
