<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'wishlists';
    protected $fillable = array('id', 'user_id', 'created_at', 'updated_at');



}