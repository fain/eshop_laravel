<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantShipping extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'merchant_shipping';
    protected $fillable = array('address', 'city', 'postcode', 'country', 'created_at', 'updated_at');
}