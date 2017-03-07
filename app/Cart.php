<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model 
{
    protected $primaryKey = 'id';
    protected $table = 'carts';
    protected $fillable = array('user_id', 'created_at', 'updated_at');


    public function user()
    {
        return $this->belongsTo('Eshop\User');
    }

    public function cartItems()
    {
        return $this->hasMany('Eshop\CartItem');
    }

}