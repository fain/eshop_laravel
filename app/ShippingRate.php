<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'shipping_rate';
    protected $fillable = array('products_id','bundle_of',
                                'wm_kg', 'wm_rm', 'add_wm_kg', 'add_wm_rm', 'sbh_kg', 'sbh_rm',
                                'add_sbh_kg', 'add_sbh_rm', 'srk_kg', 'srk_rm', 'add_srk_kg', 'add_srk_rm',
                                'cond_ship', 'cond_disc', 'cond_disc_for_purch', 'cond_free',
                                'created_at', 'updated_at');
}