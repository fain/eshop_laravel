<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model 
{
    protected $primaryKey = 'id';
    protected $table = 'wishlists';
    protected $fillable = array('user_id', 'created_at', 'updated_at');


    public function user()
    {
        return $this->belongsTo('Eshop\User');
    }

    public function wishlistItems()
    {
        return $this->hasMany('Eshop\WishlistItem');
    }

}
