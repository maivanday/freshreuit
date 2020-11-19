<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
