<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', 'Auth\LoginController@logout');


Route::middleware(['auth','admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        //Menu
        Route::resource('menu', 'MenuController')->except(['show','create']);

        //Page
        Route::resource('page', 'PageController')->except(['create']);

        //Page
        //TODO:: Clean the route below. Only keep necessary route methods.
        Route::resource('page-item', 'PageItemController')->except(['create']);

        //Sector
        Route::resource('sector', 'SectorController')->except(['show','create']);

        //Company
        Route::resource('company', 'CompanyController')->except(['create']);

        //TODO::Fix typo
        //Announcment
        Route::resource('announcment', 'AnnouncmentController')->except(['show','create']);

        //SubscriptionPlan
        Route::resource('subscriptionplan', 'SubscriptionPlanController')->except(['show','create']);
       

         //Survey
        Route::resource('survey', 'SurveyController')->except(['create']);



        //SurveyQuestion
        Route::resource('surveyquestion', 'SurveyQuestionController')->except(['create']);

        //Configuration
        Route::get('/configuration', 'StaticContentController@index')->name('configuration.index');
        Route::get('/configuration/{id}/edit', 'StaticContentController@edit')->name('configuration.edit');
        Route::patch('/configuration/{id}','StaticContentController@update')->name('configuration.update');

        //SurveyAnswerOption
        Route::resource('surveyansweroption', 'SurveyAnswerOptionController')->except(['show', 'create']);

        //News
        Route::get('/news-portal', 'NewsController@newsPortal')->name('news.portal');
        Route::post('/news-portal', 'NewsController@newsStore')->name('news.store');
        Route::get('/news-portal/{id}/edit', 'NewsController@newsEdit')->name('news.edit');
        Route::patch('/news-portal/{id}', 'NewsController@newsUpdate')->name('news.update');
        Route::delete('/news-portal/{id}', 'NewsController@newsDestroy')->name('news.destroy');
        // Route::get('/news-portal', function () {
        //   return view('back-end.news.index');
        // });

          //User
        Route::get('/user', 'UserController@index')->name('user.index');
        Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
        Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
        Route::patch('/user/{id}', 'UserController@update')->name('user.update');
        Route::delete('/user/{id} ', 'UserController@destroy')->name('user.destroy');

        //Finance Info
        //TODO:: constrain routes
        Route::resource('finance-info', 'FinanceInfoController');


        Route::get('/stockinfo', 'StockInfoController@index')->name('stockinfo.index');

        Route::get('/stockinfo/bulk', 'StockInfoController@uploadBulk')->name('stockinfo.upload-bulk');
        Route::post('/stockinfo/bulk', 'StockInfoController@storeBulk')->name('stockinfo.store-bulk');

        //invoice
        Route::get('/invoice', 'InvoiceController@index')->name('invoice.index');
        Route::get('/stockinfo/data-matrix', 'StockInfoController@dataMatrix')->name('stockinfo.data-matrix');
        Route::post('/stockinfo', 'StockInfoController@process')->name('stockinfo.process');
    });

    //Page
    // Route::resource('page', 'PageController')->except(['show']);
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::prefix('user')->group(function () {
      Route::post('survey/{surveyQuestion}', 'SurveyController@saveResponse')->name('save-response');
  });
});

Route::middleware(['auth'])->group(function () {
    Route::post('subscriptionplan/success', 'SubscriptionPlanController@success')->name('subscriptionplan.success');
    Route::post('subscriptionplan/fail', 'SubscriptionPlanController@fail')->name('subscriptionplan.fail');

    //invoice
    Route::get('/invoice-user', 'InvoiceController@invoiceUser')->name('invoice.user');
    Route::get('/invoice/getuser', 'InvoiceController@getUser')->name('invoice.getuser');
    Route::get('/invoice/{id}', 'InvoiceController@invoiceShow')->name('invoice.show');
    Route::post('/invoice/postuser', 'InvoiceController@postUser')->name('invoice.postuser');

    Route::delete('/subscriber/{id}', 'InvoiceController@destroy')->name('subscriber.destroy');

    //download
    Route::post('download', 'DownloadController@store')->name('download.store');
});


Route::get('/', 'PublicPagesController@landing')->name('home');
Route::view('/sub', 'sub-layout')->name('sub');


//Financial Info
Route::get('/finance-info', 'FinanceInfoController@all')->name('finance-info-all');

//filter
Route::get('/filter', 'FinanceInfoController@financeFilter')->name('financefilter');

//search
Route::get('/search', 'PublicPagesController@search')->name('search');
Route::get('/newssearch', 'NewsController@newsSearch')->name('newssearch');

//mail
Route::post('/contact-us', 'PublicPagesController@contactUs')->name('contactus');
Route::post('/subscribe', 'PublicPagesController@subscribe')->name('subscribe');

//News
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/single-news/{id}', 'NewsController@singleNews')->name('news.single');
// Route::get('/news', function () {
//   return view('front-end.news.index');
// });
// Route::get('/single-news', function () {
//   return view('front-end.news.single-news');
// });

Route::get('/visualize', 'VisualizeController@index')->name('visualize.index');

Route::get('/data-matrix', 'VisualizeController@dataMatrix')->name('visualize.data-matrix');
Route::post('/subscribe-plan', 'SubscriptionPlanController@subscribePlan')->name('subscribe.plan');


//comment
Route::post('/comment', 'CommentController@store')->name('comment.store');
Route::delete('/comment/{id}', 'CommentController@destroy')->name('comment.destroy');


//Page
Route::get('{slug}', 'PageController@page')->name('page');

