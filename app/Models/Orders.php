<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    protected $fillable = ['payment_method', 'total_price'];

    public function items()
    {
        return $this->hasMany(OrderItems::class, 'orders_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
