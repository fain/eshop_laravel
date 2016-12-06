<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class MerchantsBusDetails extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'merchants_bus_details';
    protected $fillable = array('user_id', 'name', 'email', 'phone', 'updated_at', 'created_at');
}
