<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\User;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'createdBy', 'imgUrl', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Admin\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Admin\Tag');
    }
}
