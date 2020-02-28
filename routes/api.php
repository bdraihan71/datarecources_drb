<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getcompany/{sectorid}', 'ApiController@getCompany');
Route::get('AWS_ACCESS_KEY_ID=AKIASXHXRUSDAFPB4O5Q
AWS_SECRET_ACCESS_KEY=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
AWS_DEFAULT_REGION=ap-southeast-1
AWS_BUCKET=data-resource-bd-staging
S3_URL="https://data-resource-bd-staging.s3-ap-southeast-1.amazonaws.com/"AWS_ACCESS_KEY_ID=AKIASXHXRUSDAFPB4O5Q
AWS_SECRET_ACCESS_KEY=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
AWS_DEFAULT_REGION=ap-southeast-1
AWS_BUCKET=data-resource-bd-staging
S3_URL="https://data-resource-bd-staging.s3-ap-southeast-1.amazonaws.com/"', 'ApiController@fetchDSE');

route::get('news/{time}', 'ApiController@getAllNews');