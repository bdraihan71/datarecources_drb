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
use Illuminate\Database\Eloquent\Collection;

class PublicPagesController extends Controller
{
    public function landing(){
        $survey_results = Survey::where('is_published', true)->get();
        $surveys = Survey::where('is_accepting_answer', true)->get();
        $staticcontent = StaticContent::all();


       $url = "https://www.dsebd.org/";
       $ch1= curl_init();
       curl_setopt ($ch1, CURLOPT_URL, $url );
       curl_setopt($ch1, CURLOPT_HEADER, 0);
       curl_setopt($ch1,CURLOPT_VERBOSE,1);
       curl_setopt($ch1, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
       curl_setopt ($ch1, CURLOPT_REFERER,'http://www.google.com');  //just a fake referer
       curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch1,CURLOPT_POST,0);
       curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 20);
       
       $htmlContent= curl_exec($ch1);
       


        return view('front-end.home.index', compact('surveys', 'survey_results','staticcontent', 'htmlContent'));
    }

    public function search(Request $request)
    {
        $companies = Company::where('name', 'LIKE', "%$request->search%")
        ->orwhere('ticker', 'LIKE', "%$request->search%")->get();
        if($companies->count() > 0)
        {
            $finance_infos = new Collection();
            foreach ($companies as $company)
            {
                $finance_info = FinanceInfo::where('company_id', 'LIKE', "$company->id")->first();
                if ($finance_info != null) {
                    $finance_infos->push($finance_info);
                }
            }
        }
        // elseif($tickers->count() > 0)
        // {
        //     $finance_infos = new Collection();
        //     foreach ($tickers as $ticker)
        //     {
        //         $finance_info = FinanceInfo::where('company_id', 'LIKE', "$ticker->id")->first();
        //         if ($finance_info != null) {
        //             $finance_infos->push($finance_info);
        //         }
        //     }
        // }
        else{
            $finance_infos = FinanceInfo::where('year', 'LIKE', "%$request->search%")->get();
        }

        $menu = Menu::where('title', 'LIKE', "%$request->search%")->first();
        $pageitems = PageItem::where('particular', 'LIKE', "%$request->search%")->get();
        if($menu != null)
        {
            $pages = Page::where('menu_id', 'LIKE', "%$menu->id%")
            ->orwhere('title', 'LIKE', "%$request->search%")->get();
        }
        // elseif( $pageitems->count() > 0)
        // {
        //     $pages = new Collection();
        //     foreach ($pageitems as $pageitem)
        //     {
        //         $page = Page::where('id', 'LIKE', "%$pageitem->page_id%")->first();
        //         if ($page != null) {
        //             $pages->push($page);
        //         }
        //     }
        // }
        else{
            $pages = Page::where('title', 'LIKE', "%$request->search%")
            ->orWhere('description', 'LIKE', "%$request->search%")->get();
        }



        return view('front-end.search.search', compact('finance_infos', 'pages', 'pageitems'));
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
