<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $table = 'user_info';

    protected $fillable = [
        'user_id', 'dob', 'gender', 'c_number', 'created_at', 'updated_at',
    ];
}
