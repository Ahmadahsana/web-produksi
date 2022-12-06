<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function order_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_username', 'username');
    }
}
