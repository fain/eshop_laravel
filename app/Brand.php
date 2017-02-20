<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Brand extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'brands';
    protected $fillable = array('category_id', 'name', 'brand_name', 'path', 'status', 'created_at', 'updated_at', 'created_at_ip', 'updated_at_ip');
}