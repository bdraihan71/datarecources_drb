<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends DrbModel
{
    public function subscriptionplan()
    {
        return $this->belongsTo('App\SubscriptionPlan','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plan()
    {
        return $this->belongsTo('App\SubscriptionPlan','plan_id');
    }
}
