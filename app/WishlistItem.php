<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    public function wishlist()
    {
        return $this->belongsTo('Eshop\Wishlist');
    }

    public function product()
    {
        return $this->belongsTo('Eshop\Product');
    }
}
