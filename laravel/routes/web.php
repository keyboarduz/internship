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

App::singleton('App\Services\AmoCRM\Api', function () {
    return new \App\Services\AmoCRM\Api(config('services.amo'));
});/*

$instance = App::make('App\Services\AmoCRM\Api');

dd($instance);*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lead/create', 'Crm\CrmController@create')->name('lead/create');

Route::post('lead', 'Crm\CrmController@store')->name('lead');
