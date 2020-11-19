<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];
    public function orders()
    {

        return $this->belongsTo(Order::class, 'order_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
