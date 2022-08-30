<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\User;

class UserDetail extends Model
{
    public function user() {
        return $this->belongsTo('App\Admin\User');
    }
}
