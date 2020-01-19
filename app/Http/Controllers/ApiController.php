<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Company;
use Symfony\Component\DomCrawler\Crawler;
use App\StockInfo;
use App\Sector;
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
            $companies = Company::where('sector_id',$sector_id)->get();
        }
        return response()->json($companies);
    }

    //http://127.0.0.1:8001/api/fetch/dse?url=http://dsebd.org/latest_share_price_all_by_change.php
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
                    'last_trading_price' => $row->children()->eq(2)->text(),
                    'closing_price' => $row->children()->eq(5)->text(),
                    'yesterday_closing' => $row->children()->eq(6)->text(),
                    'price_change' => $row->children()->eq(7)->text(),
                    'turnover_bdt_mn' => $row->children()->eq(9)->text(),
                    'volume' => $row->children()->eq(10)->text(),
                    'trade' => $row->children()->eq(8)->text(),
                    'sponsor_or_director'=> '',
                    'foreign_public' => '',
                    'paid_up_capital_bdt_mn' => '',
                    'five_year_revenue_cagr' => '',
                    'five_year_npat_cagr'  => '',
                    'p_or_e_audited'  => '',
                    'p_or_e_unaudied'   => '',
                    'navps'   => '',
                    'p_or_navps_divinded' => '',
                    'dividend_yield' => ''
                ]);

                $stockinfo->touch();

            } 
        });

        return response()->json([
            'success' => true
        ]);
    }
}
