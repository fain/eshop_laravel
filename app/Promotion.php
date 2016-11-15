<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Promotion extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'promotions';
    protected $fillable = array('products_id', 'promo_text', 'country_origin', 'mul_pur_disc_set',
                                'mul_pur_disc_item', 'mul_pur_disc_sel', 'mul_pur_disc', 'mul_pur_disc_period_set',
                                'mul_pur_period_start', 'mul_pur_period_end', 'min_pur', 'min_pur_val', 'max_pur',
                                'max_per_ord', 'max_per_pers', 'ad_sel', 'ad_start', 'ad_end', 'created_at',
                                'updated_at');
}