<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantsInfo extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'merchants_info';
    protected $fillable = array('user_id', 'store_name', 'store_url', 'updated_at','created_at');
}
