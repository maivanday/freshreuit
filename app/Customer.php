<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model

{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
