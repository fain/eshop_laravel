<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    public function product()
    {
        return $this->belongsTo('Eshop\Product');
    }

    public function file()
    {
        return $this->belongsTo('Eshop\File');
    }

    
}

