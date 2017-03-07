<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model 
{

    public function user()
    {
        return $this->belongsTo('Eshop\User');
    }

    public function wishlistItems()
    {
        return $this->hasMany('Eshop\WishlistItem');
    }

}