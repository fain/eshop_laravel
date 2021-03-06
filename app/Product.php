<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array('category_id','brand_id','merchants_id',
                                'created_at', 'updated_at', 'created_at_ip', 'updated_at_ip');

  	public function file()
    {
        return $this->belongsTo('Eshop\File');
    }

    
}