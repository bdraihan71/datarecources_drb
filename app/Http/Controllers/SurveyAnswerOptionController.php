<?php

namespace App\Http\Controllers;

use App\SurveyAnswerOption;
use App\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyAnswerOptionController extends Controller
{
    public function index()
    {
        $surveyansweroptions = SurveyAnswerOption::orderBy('answer_option')->get()->sortBy('answer_option', SORT_NATURAL|SORT_FLAG_CASE);
        $surveyquestions = SurveyQuestion::orderBy('question')->get()->sortBy('question', SORT_NATURAL|SORT_FLAG_CASE);
        return view('back-end.survey-answer-option.index', compact('surveyquestions', 'surveyansweroptions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'survey_question_id' => 'required',
            'answer_option' => 'required',
        ]);
        $surveyAnswerOption = new SurveyAnswerOption([
            'survey_question_id' => $request->get('survey_question_id'),
            'answer_option' => $request->get('answer_option')

        ]);
        $surveyAnswerOption->save();
        return redirect(route('surveyansweroption.index'))->with('success', 'Survey answer option has been created successfully');
    }

    public function edit($id)
    {
        $surveyansweroption = SurveyAnswerOption::find($id);
        return view('back-end.survey-answer-option.edit', compact('surveyansweroption'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
        ]);
        $menu = Menu::find($id);
        $menu->title = $request->get('title');
        $menu->parent_menu_id = $request->get('parent_menu_id');
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu has been updated successfully');
    }

    public function destroy($id)
    {
        $surveyAnswerOption = SurveyAnswerOption::find($id);
        $surveyAnswerOption->delete();
        return redirect()->route('surveyansweroption.index')->with('success', 'Survey Answer Option has been deleted successfully');
    }
}
