<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->hasMany(District::class, 'city_id', 'city_id');
    }
}
