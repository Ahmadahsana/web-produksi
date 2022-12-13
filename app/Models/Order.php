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
        return $this->belongsTo(User::class, 'sales_username', 'username');
    }

    public function status_pengerjaan()
    {
        return $this->belongsTo(Status_pengerjaan::class);
    }
}
