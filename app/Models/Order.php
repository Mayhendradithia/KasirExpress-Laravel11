<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'product_id',
        'quantity',
        'total_price',
        'status',
        'payment_method',
        'payment_reference',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function items()
{
    return $this->hasMany(OrderItem::class);
}

}
