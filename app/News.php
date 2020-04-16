<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends DrbModel
{
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('id', 'DESC');
    }
}
