<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'products_info';
    protected $fillable = array('products_id', 'type', 'prod_name', 'prod_code', 
                                    'short_details', 'details', 'gst_type', 'selling_period_set',
                                    'selling_period_day', 'selling_period_start', 'selling_period_end',
                                    'price', 'tier_price', 'inst_price', 'discount_set', 'discount_sel',
                                    'discount_val', 'discount_period_set', 'discount_period_start',
                                    'discount_period_end', 'weight', 'stock_quantity', 'option_id',
                                    'merchant_shipping_id', 'merchant_return_id', 'shipping_method',
                                    'ship_rate', 'ship_rate_id', 'after_sale_serv', 'return_policy',
                                    'promo_set', 'promo_id', 'created_at', 'updated_at');
}