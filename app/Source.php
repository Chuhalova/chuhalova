<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id');
    }
}
