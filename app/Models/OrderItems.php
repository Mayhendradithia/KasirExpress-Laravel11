<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['orders_id', 'product_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
