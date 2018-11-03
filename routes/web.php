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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'campaign'], function () {
        Route::get('/', 'CampaignController@index')->name('campaign');
        Route::get('get', 'CampaignController@get');
        Route::post('save', 'CampaignController@save');
        Route::post('delete', 'CampaignController@delete');
    });
    Route::group(['prefix' => 'subscriber'], function () {
        Route::get('/', 'SubscriberController@index')->name('subscriber');
        Route::get('get', 'SubscriberController@get');
    });

});

