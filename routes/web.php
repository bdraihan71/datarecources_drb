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

Route::get('/', function () {
    return view('welcome');
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


