<?php

namespace App\Http\Controllers;

use App\Survey;
use App\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index()
    {
        $surveys = Survey::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        $surveyquestions = SurveyQuestion::orderBy('question')->get()->sortBy('question', SORT_NATURAL|SORT_FLAG_CASE);
        return view('back-end.survey-question.index', compact('surveys', 'surveyquestions'));
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
        return redirect()->route('surveyquestion.index')->with('success', 'Survey question has been created successfully');
    }

    public function edit($id)
    {
        $surveys = Survey::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        $surveyquestion = SurveyQuestion::find($id);
        return view('back-end.survey-question.edit', compact('surveys', 'surveyquestion'));
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
        return redirect()->route('surveyquestion.index')->with('success', 'Survey question has been updated successfully');
    }

    public function destroy($id)
    {
        $surveyquestion = SurveyQuestion::find($id);
        $surveyquestion->delete();
        return redirect()->route('surveyquestion.index')->with('success', 'Survey question has been deleted successfully');
    }
}
