<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
	protected $primaryKey = 'id';
    protected $table = 'wishlist_items';
    protected $fillable = array('wishlist_id', 'product_id', 'created_at', 'updated_at');

    public function wishlist()
    {
        return $this->belongsTo('Eshop\Wishlist');
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
