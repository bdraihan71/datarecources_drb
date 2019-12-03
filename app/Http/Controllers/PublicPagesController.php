<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Http\Request;
use App\FinanceInfo;
use App\Company;
use App\Page;
use App\Menu;
use Mail;
use App\Mail\ContactUs;
use App\Mail\Subscribe;
use App\PageItem;
use App\StaticContent;

class PublicPagesController extends Controller
{
    public function landing(){
        $survey_results = Survey::where('is_published', true)->get();
        $surveys = Survey::where('is_accepting_answer', true)->get();
        $staticcontent = StaticContent::all();
        return view('front-end.home.index', compact('surveys', 'survey_results','staticcontent'));
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
        $pageitems = PageItem::where('particular', 'LIKE', "%$request->search%")->get();
        if($menu != null)
        {

            $pages = Page::where('menu_id', 'LIKE', "%$menu->id%")->get();
        }
        elseif( $pageitems->count() > 0)
        {
            // $pages = array();
            foreach ($pageitems as $pageitem)
            {
                $pages = Page::where('id', 'LIKE', "%$pageitem->page_id%")->get();
                // $pages[] = $page;
            }
            // dd($pages);
        }
        else{
            $pages = Page::where('title', 'LIKE', "%$request->search%")
            ->orWhere('description', 'LIKE', "%$request->search%")->get();
        }



        return view('front-end.search.search', compact('finance_infos', 'pages'));
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'body' => 'required|max:255',
        ]);
        Mail::to([env('MY_MAIL')])
        ->queue(new ContactUs( $request->email, $request->body));

        return Redirect()->back()->with('success', 'Your message successfully sent');

    }

    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        Mail::to([env('MY_MAIL')])
        ->queue(new Subscribe( $request->email));

        return Redirect()->back()->with('success', 'Your email successfully subscribed');

    }


}
