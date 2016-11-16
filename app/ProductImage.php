<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'product_image';
    protected $fillable = array('products_id', 'name', 'path', 'size', 'created_at', 'updated_at');
}