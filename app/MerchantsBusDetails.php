<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantsBusDetails extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'merchants_bus_details';
    protected $fillable = array('user_id', 'name', 'email', 'phone', 'ship_add', 'ship_state', 'ship_city', 'ship_pcode', 'rtn_add', 'rtn_state', 'rtn_city', 'rtn_pcode','updated_at','created_at');
}
