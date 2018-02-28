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

//Made by Randall
Route::get('/randall', function(){
    return view('operators.edit2NiRandall');
});



Route::get('/', function () {
    return view('welcome');


});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('home/ledger', 'DailyLedgerController');

Route::resource('home/announcements', 'AnnouncementsController');


//Operators
Route::resource('home/operators', 'OperatorsController');
Route::get('home/operators/profile/{operator}','OperatorsController@showProfile')->name('operators.showProfile');

/************ Drivers ******************************/
Route::resource('home/drivers', 'DriversController');

//Adding a driver to a specific operator
Route::get('home/operators/{operator}/drivers/create', 'DriversController@createFromOperator')->name('drivers.createFromOperator');
Route::post('home/operators/{operator}/drivers/', 'DriversController@storeFromOperator')->name('drivers.storeFromOperator');

//Adding a driver to a specific van
Route::get('home/operators/{van}/drivers/create', 'DriversController@createUsingVan');
Route::post('home/operators/{van}/drivers/', 'DriversController@storeUsingVan');
/****************************************************/

/************ Vans ******************************/
Route::resource('home/vans', 'VansController');
//Creating Vans
Route::get('home/operators/{operator}/vans/create', 'VansController@create');
Route::post('home/operators/{operator}/vans', 'VansController@store');
/****************************************************/

/************ Settings ******************************/
Route::resource('home/settings/destinations', 'DestinationController', [
	'except' => ['index']
]);

Route::resource('home/settings/terminal', 'TerminalController', [
	'except' => ['index']
]);

Route::resource('home/settings/fees', 'FeesController', [
    'except' => ['index',]
]);
Route::resource('home/settings/discounts', 'DiscountsController', [
    'except' => ['index']
]);
Route::get('home/settings', 'HomeController@settings');
/****************************************************/

/************ User Management ******************************/
Route::get('home/user-management', 'HomeController@usermanagement');

Route::resource('home/user-management/admin', 'AdminUserManagementController', [
	'except' => ['index']
]);
/****************************************************/

Route::resource('home/test', 'TestController');
Route::resource('home/testing', 'TestingController');
Route::resource('home/reservations', 'ReservationsController');
Route::resource('home/rental', 'RentalsController');
