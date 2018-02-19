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
Route::resource('home/drivers', 'DriversController');
Route::resource('home/operators', 'OperatorsController');
Route::resource('home/vans', 'VansController');
Route::resource('home/settings/fees', 'FeesController', [
    'except' => ['index','show']
]);
Route::resource('home/settings/discounts', 'DiscountsController', [
    'except' => ['index','show']
]);
Route::get('home/settings/', 'HomeController@settings');