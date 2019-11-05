<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends DrbModel
{
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
}
