<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ProductOptionGroup extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'product_option_group';
    protected $fillable = array('name', 'prod_opt', 'status', 'created_at', 'updated_at');
}