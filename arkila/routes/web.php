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
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('home/ledger', 'DailyLedgerController');

Route::resource('home/announcements', 'AnnouncementsController');

//Drivers
Route::resource('home/drivers', 'DriversController');
Route::get('home/drivers/create', 'DriversController@create');
Route::post('home/drivers/', 'DriversController@store');

Route::resource('home/drivers', 'DriversController',[
	'except' => ['index','create','store']
]);

Route::get('home/operators/{operator}/drivers/create', 'DriversController@create');
Route::post('home/operators/{operator}/drivers/', 'DriversController@store');

//Operators
Route::resource('home/operators', 'OperatorsController');

//Vans
Route::resource('home/vans', 'VansController', [
    'except' => ['index','create','store']
]);
//Creating Vans
Route::get('home/operators/{operator}/vans/create', 'VansController@create');
Route::post('home/operators/{operator}/vans', 'VansController@store');

//Settings
Route::resource('home/settings/destinations', 'DestinationController', [
	'except' => ['index','create','show', 'edit']
]);
Route::resource('home/settings/fees', 'FeesController', [
    'except' => ['index','show']
]);
Route::resource('home/settings/discounts', 'DiscountsController', [
    'except' => ['index','show']
]);
Route::get('home/settings', 'HomeController@settings');

Route::resource('home/test', 'TestController');