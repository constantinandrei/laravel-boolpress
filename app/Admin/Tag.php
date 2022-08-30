<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany('App\Admin\Post');
    }
}
