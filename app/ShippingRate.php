<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'shipping_rate';
    protected $fillable = array('wm_kg', 'wm_rm', 'same_all_reg', 'add_wm_kg', 'add_wm_rm', 'sbh_kg', 'sbh_rm',
                                'add_sbh_kg', 'add_sbh_rm', 'srk_kg', 'srk_rm', 'add_srk_kg', 'add_srk_rm',
                                'created_at', 'updated_at');
}