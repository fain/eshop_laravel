<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'product_option';
    protected $fillable = array('name', 'slug', 'status', 'created_at', 'updated_at');
}