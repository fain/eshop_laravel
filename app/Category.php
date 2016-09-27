<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');

    public function maincat() {
        return $this->belongsTo('Eshop\Category', 'main_category_id');
    }

    public function subcat() {
        return $this->hasMany('Eshop\Category', 'main_category_id');
    }
}