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


Route::middleware(['auth'])->group(function () {

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
        Route::resource('company', 'CompanyController')->except(['show','create']);

        //Announcment
        Route::resource('announcment', 'AnnouncmentController')->except(['show','create']);

        //SubscriptionPlan
        Route::resource('subscriptionplan', 'SubscriptionPlanController')->except(['show','create']);

         //Survey
        Route::resource('survey', 'SurveyController')->except(['show', 'create']);

        //SurveyQuestion
        Route::resource('surveyquestion', 'SurveyQuestionController')->except(['show', 'create']);

        //Configuration
        Route::get('/configuration', 'StaticContentController@index')->name('configuration.index');
        Route::get('/configuration/{id}/edit', 'StaticContentController@edit')->name('configuration.edit');
        Route::patch('/configuration/{id}','StaticContentController@update')->name('configuration.update');

        //SurveyAnswerOption
        Route::resource('surveyansweroption', 'SurveyAnswerOptionController')->except(['show', 'create']);

    });

    //Page
    // Route::resource('page', 'PageController')->except(['show']);





});

Auth::routes();

Route::view('/', 'front-end.home.index')->name('home');
Route::view('/sub', 'sub-layout')->name('sub');

//Page
Route::get('{slug}', 'PageController@page')->name('page');