<?php

namespace Eshop;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchants extends Authenticatable
{
    //
//    protected $primaryKey = 'id';
//    protected $table = 'merchants';
//    protected $fillable = array('username', 'password', 'user_group', 'updated_at', 'created_at');
    protected $fillable = [
        'username', 'password', 'user_group', 'updated_at', 'created_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
