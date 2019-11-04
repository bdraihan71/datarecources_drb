<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends DrbModel
{
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
