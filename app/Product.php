<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array('name', 'title', 'description','price','category_id','brand_id','merchants_id',
                                'created_at', 'updated_at', 'created_at_ip', 'updated_at_ip');
}