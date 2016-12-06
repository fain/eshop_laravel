<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantReturn extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'merchant_return';
    protected $fillable = array('user_id', 'title', 'name', 'address', 'city', 'postcode', 'state',  'phone', 'created_at', 'updated_at');
}