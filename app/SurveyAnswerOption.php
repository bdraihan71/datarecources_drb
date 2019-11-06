<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswerOption extends DrbModel
{
    public function surveyQuestion()
    {
        return $this->belongsTo('App\SurveyQuestion');
    }
}
