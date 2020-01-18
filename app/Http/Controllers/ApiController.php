<?php

namespace App\Http\Controllers;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Company;
use Symfony\Component\DomCrawler\Crawler;
class ApiController extends Controller
{
    public $counter = 0;
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
                $row->each(function (Crawler $node, $i) {
                    // echo ($node->text());
                    
                    // echo($this->counter);
                });
                // $this->counter = 0;
                $this->counter++;
                echo($this->counter);
                echo ("<br>");
                echo ("====================");
            }
        );

        // dd(((string) $content->getBody()));
    }
}
