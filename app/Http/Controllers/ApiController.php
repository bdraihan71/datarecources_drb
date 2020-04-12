<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Company;
use App\News;
use App\StockInfo;
use App\Sector;
use Carbon\Carbon;
use App\Service\DSE;

class ApiController extends Controller
{
    public function getCompany($sector_id)
    {
        if( $sector_id == 'sector' )
        {
            $companies = Company::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        }
        else
        {
            $companies = Company::where('sector_id',$sector_id)->orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        }
        return response()->json($companies);
    }

    public function fetchDSE(Request $request){
        DSE::fetch();
        return response()->json([
            'success' => true
        ]);
    }

    public function getAllNews(Request $request, $time)
    {
        $from = Carbon::now()->subDays($time);
        $to = Carbon::now();
        $allnews = News::where('is_published', 1)->where('heading', 'LIKE', "%$request->search%")->whereBetween('created_at', [$from, $to])->get();

        return response()->json($allnews);
    }

    public function getCustomRangeNews(Request $request, $from, $to)
    {
        $from = Carbon::parse($from);
        $to = Carbon::parse($to);
        $allnews = News::where('is_published', 1)->where('heading', 'LIKE', "%$request->search%")->whereBetween('created_at', [$from, $to])->get();

        return response()->json($allnews);
    }

    
}
