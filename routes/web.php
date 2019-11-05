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
        Route::resource('menu', 'MenuController')->except(['show']);
        
        //Page
        Route::resource('page', 'PageController')->except(['show']);
    });




    //Sector
    Route::resource('sector', 'SectorController')->except(['show']);

    //SubscriptionPlan
    Route::resource('subscriptionplan', 'SubscriptionPlanController')->except(['show']);

    //Configuration
    Route::get('/configuration', 'StaticContentController@index')->name('configuration.index');
    Route::get('/configuration/{id}/edit', 'StaticContentController@edit')->name('configuration.edit');
    Route::patch('/configuration/{id}','StaticContentController@update')->name('configuration.update');

    //Announcment
    Route::resource('announcment', 'AnnouncmentController')->except(['show']);

    //Company
    Route::resource('company', 'CompanyController')->except(['show']);

    //Page
    // Route::resource('page', 'PageController')->except(['show']);

    //SurveyQuestion
    Route::resource('surveyquestion', 'SurveyQuestionController')->except(['show']);

    //Survey
    Route::resource('survey', 'SurveyController')->except(['show']);

});

Auth::routes();

Route::view('/', 'main-layout')->name('home');
    Route::view('/sub', 'sub-layout')->name('sub');
    Route::view('/admin', 'admin-layout')->name('admin');
