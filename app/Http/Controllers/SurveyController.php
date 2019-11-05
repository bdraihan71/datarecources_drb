<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        return view('back-end.survey.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->get('is_published') == null){
            $is_published = 0;
          } else {
            $is_published = request('is_published');
        }

        if($request->get('is_accepting_answer') == null){
            $is_accepting_answer = 0;
          } else {
            $is_accepting_answer = request('is_accepting_answer');
        }


        $survey = new Survey([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'is_published' => $is_published,
            'is_accepting_answer' => $is_accepting_answer
        ]);
        $survey->save();
        return redirect()->route('survey.index')->with('success', 'Survey has been created successfully');
    }


    public function edit($id)
    {
        $survey = Survey::find($id);
        return view('back-end.survey.edit', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($request->get('is_published') == null){
            $is_published = 0;
          } else {
            $is_published = request('is_published');
        }

        if($request->get('is_accepting_answer') == null){
            $is_accepting_answer = 0;
          } else {
            $is_accepting_answer = request('is_accepting_answer');
        }

        $survey = Survey::find($id);
        $survey->title = $request->get('title');
        $survey->description = $request->get('description');
        $survey->is_published = $is_published;
        $survey->is_accepting_answer = $is_accepting_answer;
        $survey->save();
        return redirect()->route('survey.index')->with('success', 'Survey has been updated successfully');
    }


    public function destroy($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect()->route('survey.index')->with('success', 'Survey has been deleted successfully');
    }
}
