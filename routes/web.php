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

Route::get('/', 'PublicPagesController@landing')->name('home');
Route::view('/sub', 'sub-layout')->name('sub');


//Financial Info
Route::get('/finance-info', 'FinanceInfoController@all')->name('finance-info-all');

//filter
Route::get('/filter', 'FinanceInfoController@financeFilter')->name('financefilter');

//search
Route::get('/search', 'PublicPagesController@search')->name('search');

//mail
Route::post('/contact-us', 'PublicPagesController@contactUs')->name('contactus');
Route::post('/subscribe', 'PublicPagesController@subscribe')->name('subscribe');


//Page
Route::get('{slug}', 'PageController@page')->name('page');



