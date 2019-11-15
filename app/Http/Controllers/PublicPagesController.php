<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    public function landing(){
        $survey_results = Survey::where('is_published', true)->get();
        $surveys = Survey::where('is_accepting_answer', true)->get();
        return view('front-end.home.index', compact('surveys', 'survey_results'));
    }
}
