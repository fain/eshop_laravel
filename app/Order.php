<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('Eshop\User');
    }

    public function orderItems()
    {
        return $this->hasMany('Eshop\OrderItem');
    }
}
