<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
	protected $primaryKey = 'id';
    protected $table = 'cart_items';
    protected $fillable = array('cart_id', 'product_id', 'quantity', 'created_at', 'updated_at');

    public function cart()
    {
        return $this->belongsTo('Eshop\Cart');
    }

    public function product()
    {
        return $this->belongsTo('Eshop\ProductInfo');
    }

    public function image()
    {
        return $this->belongsTo('Eshop\ProductImage');
    }
    public function merchant()
    {
        return $this->belongsTo('Eshop\MerchantsInfo');
    }
     public function brand()
    {
        return $this->belongsTo('Eshop\Brand');
    }
}
