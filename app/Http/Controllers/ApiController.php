<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Company;
use App\News;
use Symfony\Component\DomCrawler\Crawler;
use App\StockInfo;
use App\Sector;
use Carbon\Carbon;
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

    //http://127.0.0.1:8001/api/fetch/dse?url=
    public function fetchDSE(Request $request){
        $client = new Client();
        $crawler = $client->request('GET', $request->url);
        $crawler->filter('table')->children()->each(function (Crawler $row, $i) {
            if($i != 0){
                $company = Company::where('ticker', $row->children()->eq(1)->text())->first();
                if(!$company){
                    $sector = Sector::firstOrcreate([
                            'name' => 'Unassigned'
                        ]);
                    $company = Company::create([
                            'name' => $row->children()->eq(1)->text(),
                            'ticker' => $row->children()->eq(1)->text(),
                            'sector_id' => $sector->id
                    ]);
                }
                $stockinfo = StockInfo::firstOrcreate([
                    'company_id' => $company->id,
                ]);

                $stockinfo->company_id = $company->id;
                $stockinfo->last_trading_price = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(2)->text()));
                $stockinfo->closing_price = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(5)->text()));
                $stockinfo->yesterday_closing = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(6)->text()));
                $stockinfo->price_change = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(7)->text()));
                $stockinfo->turnover_bdt_mn = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(9)->text()));
                $stockinfo->volume = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(10)->text()));
                $stockinfo->trade = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(8)->text()));
                   
                $stockinfo->touch();
                $stockinfo->save();
            } 
        });

        $this->fetchPEfromDSE();

        return response()->json([
            'success' => true
        ]);
    }

    public function fetchPEfromDSE(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.dsebd.org/latest_PE_all.php');
        $crawler->filter('table')->children()->each(function (Crawler $row, $i) {
            if($i != 0){
                $company = Company::where('ticker', $row->children()->eq(1)->text())->first();
                if(!$company){
                    $sector = Sector::firstOrcreate([
                            'name' => 'Unassigned'
                        ]);
                    $company = Company::create([
                            'name' => $row->children()->eq(1)->text(),
                            'ticker' => $row->children()->eq(1)->text(),
                            'sector_id' => $sector->id
                    ]);
                }

                $stockinfo = StockInfo::firstOrcreate([
                    'company_id' => $company->id
                ]);

                $stockinfo->company_id = $company->id;
                $stockinfo->close_price_from_pe = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(2)->text()));
                $stockinfo->ycp = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(3)->text()));
                $stockinfo->pe_1_basic = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(4)->text()));
                $stockinfo->pe_2_diluted = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(5)->text()));
                $stockinfo->pe_3_basic = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(6)->text()));
                $stockinfo->pe_4_diluted = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(7)->text()));
                $stockinfo->pe_5 = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(8)->text()));
                $stockinfo->pe_6 = floatval(preg_replace('/[^\d.]/', '', $row->children()->eq(9)->text()));
                    dd($stockinfo);
                $stockinfo->touch();
                $stockinfo->save();

            } 
        });
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
