<?php

namespace App\Http\Controllers;

use App\Survey;
use App\SurveyAnswerOption;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function homePage()
    {
        $surveys = Survey::all();
        return view('front-end.home.index', compact('surveys'));
    }

    public function vote(Request $request)
    {
        $surveyansweroption = SurveyAnswerOption::find($request->survey_answer_option_id);
        $surveyansweroption->hit_count = $surveyansweroption->hit_count + 1;
        $surveyansweroption->save();
        return redirect()->back()->with('success', 'Your vote has successfully been recorded');
    }
}
