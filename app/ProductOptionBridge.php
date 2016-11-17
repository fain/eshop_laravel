<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ProductOptionBridge extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'product_option_bridge';
    protected $fillable = array('product_option_group_id', 'product_option_id', 'created_at', 'updated_at');
}