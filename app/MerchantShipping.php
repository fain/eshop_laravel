<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantShipping extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'merchant_shipping';
    protected $fillable = array('user_id', 'title', 'name', 'address', 'city', 'postcode', 'state',  'phone', 'set_default', 'bundle_rate', 'created_at', 'updated_at');
}