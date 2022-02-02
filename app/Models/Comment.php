<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //blog_post_id(snakecase)//basically it laravel checks as
    // blog_post_id hence blogPost
    public function blogPost()
    {
        return $this->belongsTo('App\Models\BlogPost');
    }
}
