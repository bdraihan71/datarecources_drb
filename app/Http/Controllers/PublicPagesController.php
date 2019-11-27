<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Http\Request;
use App\FinanceInfo;
use App\Company;
use App\Page;
use App\Menu;

class PublicPagesController extends Controller
{
    public function landing(){
        $survey_results = Survey::where('is_published', true)->get();
        $surveys = Survey::where('is_accepting_answer', true)->get();
        return view('front-end.home.index', compact('surveys', 'survey_results'));
    }

    public function search(Request $request)
    {
        $company = Company::where('name', 'LIKE', "%$request->search%")->first();
        $ticker = Company::where('ticker', 'LIKE', "%$request->search%")->first();

        if($company != null)
        {
            $finance_infos = FinanceInfo::where('company_id', 'LIKE', "%$company->id%")->get();
        }elseif($ticker != null)
        {
            $finance_infos = FinanceInfo::where('company_id', 'LIKE', "%$ticker->id%")->get();
        }
        else{
            $finance_infos = FinanceInfo::where('year', 'LIKE', "%$request->search%")->get();
        }  

        $menu = Menu::where('title', 'LIKE', "%$request->search%")->first();
        if($menu != null)
        {
            $pages = Page::where('menu_id', 'LIKE', "%$menu->id%")->get();
        }else{
            $pages = Page::where('title', 'LIKE', "%$request->search%")
            ->orWhere('description', 'LIKE', "%$request->search%")->get();
        }
        

        return view('front-end.search.search', compact('finance_infos', 'pages'));
    }


}
