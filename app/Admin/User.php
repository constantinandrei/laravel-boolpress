<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\UserDetail;
// use App\Admin\Post;

class User extends Model
{
    public function details(){
        return $this->hasOne('App\Admin\UserDetail');
    }

    public function posts(){
        return $this->hasMany('App\Admin\Post');
    }
}
