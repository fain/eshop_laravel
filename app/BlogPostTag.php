<?php

namespace Eshop;

use Illuminate\Database\Eloquent\Model;

class BlogPostTag extends BaseModel {
    protected $fillable = array('post_id', 'tag_id');
}
