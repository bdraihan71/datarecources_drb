<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Company;
use Symfony\Component\DomCrawler\Crawler;
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

    public function fetchDSE(Request $request){
        // $endpoint = $request->url;
        // $client = new \GuzzleHttp\Client();
        // $id = 5;
        // $value = "ABC";

        // $response = $client->request('GET', $endpoint, ['query' => [
        //     'key1' => $id, 
        //     'key2' => $value,
        // ]]);

        // // url will be: http://my.domain.com/test.php?key1=5&key2=ABC;

        // $statusCode = $response->getStatusCode();
        // $content = $response;


        $client = new Client();
        $crawler = $client->request('GET', $request->url);
        $crawler->filter('table')->children()->each(function (Crawler $row, $i) {
            if($i != 0){
                $row->children()->each(function (Crawler $node, $i) {
                    switch ($i){
                        case 0:
                            echo("ID: " . $node->text());
                        break;
                        case 1:
                            $company = Company::where('ticker', $node->text())->find();
                            if($company){
                                StockInfo::create([
                                    'company_id' => $company->id,
                                    'last_trading_price' => $node->eq(2),
                                    'closing_price' => $node->eq(5),
                                ]);
                                // $table->string('yesterday_closing');
                                // $table->string('price_change');
                                // $table->string('turnover_(bdt_mn)');
                                // $table->string('volume');
                                // $table->string('trade');
                                // $table->string('sponsor_or_director');
                                // $table->string('foreign_public');
                                // $table->string('paid_up_capital_bdt_mn');
                                // $table->string('5_year_revenue_cagr');
                                // $table->string('5_year_npat_cagr');
                                // $table->string('p_or_e_audited');
                                // $table->string('p_or_e_unaudied');
                                // $table->string('navps');
                                // $table->string('p_or_navps_divinded');
                                // $table->string('dividend_yield');
                            }
                            else{
                                echo("company not found in database");
                                //TODO:: create company and sector if necessary
                            }
                            echo("COMPANY: " . $node->text());
                        break;
                        case 2:
                            echo("LTP*: " . $node->text());
                        break;
                        case 3:
                            echo("HIGH: " . $node->text());
                        break;
                        case 4:
                            echo("LOW: " . $node->text());
                        break;
                        case 5:
                            echo("CLOSEP*: " . $node->text());
                        case 6:
                            echo("YCP: " . $node->text());
                        break;
                        case 7:
                            echo("%CHANGE: " . $node->text());
                        break;
                        case 8:
                            echo("TRADE: " . $node->text());
                        break;
                        case 9:
                            echo("VALUE(mm): " . $node->text());
                        break;
                        case 10:
                            echo("VOLUME: " . $node->text());
                        break;
                        default:
                            echo("null");
                    }
                    // echo($node->text());
                    echo ("<br>");
                });
                echo ("<br>");echo ("<br>");echo ("<br>");echo ("<br>");
            } 
        });

        // dd(((string) $content->getBody()));
    }
}
