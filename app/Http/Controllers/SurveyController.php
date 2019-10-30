<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
       dd($surveys);
    }

    public function create()
    {
       dd('hello');
    }


    public function edit($id)
    {
        $survey = Survey::find($id);
    }


    public function destroy($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect()->route('survey.index');
    }
}
