<?php

namespace App\Http\Controllers;

use App\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index()
    {
        $surveyquestions = SurveyQuestion::orderBy('question')->get()->sortBy('question', SORT_NATURAL|SORT_FLAG_CASE);
        dd($surveyquestions);
    }

    public function create()
    {
       dd('hello');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'survey_id' => 'required',
            'question' => 'required',
        ]);

        $surveyquestion = new SurveyQuestion([
            'survey_id' => $request->get('survey_id'),
            'question' => $request->get('question')
        ]);
        $surveyquestion->save();
        return redirect()->route('surveyquestion.index');
    }

    public function edit($id)
    {
        $surveyquestion = SurveyQuestion::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'survey_id' => 'required',
            'question' => 'required',
        ]);
        $surveyquestion = SurveyQuestion::find($id);
        $surveyquestion->survey_id = $request->get('survey_id');
        $surveyquestion->question = $request->get('question');
        $surveyquestion->save();
        return redirect()->route('surveyquestion.index');
    }

    public function destroy($id)
    {
        $surveyquestion = SurveyQuestion::find($id);
        $surveyquestion->delete();
        return redirect()->route('surveyquestion.index');
    }
}
