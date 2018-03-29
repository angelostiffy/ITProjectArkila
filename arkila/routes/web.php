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

Auth::routes();

//Made by Randall

Route::get('/randall', 'RandallController@index');

/*Log in*/
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
/*Email Verification*/
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
/*Reset Password*/
// Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('/teo', function(){
    return view('rental.newcreate');
});

Route::get('/dixon', 'TripsController@index');

Route::get('/ticketmanagement','TransactionsController@manage');



Route::get('/', 'CustomerModuleControllers\CustomerNonUserHomeController@indexNonUser')->name('customermodule.non-user.index');
/***********************Super-Admin Module************************************/
/*****************************************************************************/
 Route::group(['middleware' => ['auth', 'super-admin']], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/home/ledger', 'DailyLedgerController');

    Route::resource('/home/announcements', 'AnnouncementsController');


    //Operators
    Route::resource('/home/operators', 'OperatorsController');
    Route::get('/home/operators/profile/{operator}','OperatorsController@showProfile')->name('operators.showProfile');

    /************ Drivers ******************************/
    Route::resource('/home/drivers', 'DriversController');

    //Adding a driver to a specific operator
    Route::get('/home/operators/{operator}/drivers/create', 'DriversController@createFromOperator')->name('drivers.createFromOperator');
    Route::post('/home/operators/{operator}/drivers/', 'DriversController@storeFromOperator')->name('drivers.storeFromOperator');

    //Adding a driver to a specific van
    Route::get('/home/vans/{vanNd}/drivers/create', 'DriversController@createFromVan')->name('drivers.createFromVan');
    Route::post('/home/vans/{vanNd}/drivers/', 'DriversController@storeFromVan')->name('drivers.storeFromVan');

    //Give the list of certain drivers
    Route::post('/listDrivers','VansController@listDrivers')->name('vans.listDrivers');
    /****************************************************/

    /************ Vans ******************************/
    Route::resource('/home/vans', 'VansController', [
        'except' => ['show']
    ]);
    //Creating Vans
    Route::get('/home/operators/{operator}/vans/create', 'VansController@createFromOperator')->name('vans.createFromOperator');
    Route::post('/home/operators/{operator}/vans', 'VansController@storeFromOperator')->name('vans.storeFromOperator');

    //Give the info of a van
    Route::post('/vanInfo','VansController@vanInfo')->name('vans.vanInfo');
    /****************************************************/

    /************ Settings ******************************/
    Route::resource('/home/settings/destinations', 'DestinationController', [
        'except' => ['index','show']
    ]);

    Route::resource('/home/settings/terminal', 'TerminalController', [
        'except' => ['index','show']
    ]);

    Route::resource('/home/settings/fees', 'FeesController', [
        'except' => ['index','show']
    ]);
    Route::resource('/home/settings/discounts', 'DiscountsController', [
        'except' => ['index', 'show']
    ]);

    Route::resource('/home/settings/tickets','TicketsController',[
        'except' => ['index','show']
    ]);
    Route::get('/home/settings', 'HomeController@settings')->name('settings.index');

     Route::post('/home/settings/changeFeature/{feature}', 'HomeController@changeFeatures')->name('settings.changeFeature');

    /****************************************************/

    /************ User Management ******************************/
    Route::get('/home/user-management', 'HomeController@usermanagement')->name('usermanagement.dashboard');

    Route::resource('/home/user-management/admin', 'AdminUserManagementController', [
        'except' => ['index','destroy'],
        'parameters' => ['admin' => 'admin_user']
    ]);
    Route::post('/home/user-management/admin/change-status', array('as' => 'changeAdminStatus','uses' => 'AdminUserManagementController@changeAdminStatus'));

    Route::resource('/home/user-management/driver', 'UserDriversManagementController', [
        'except' => ['index','store', 'create','edit','destroy'],
        'parameters' => ['driver' => 'driver_user']

    ]);
    Route::post('/home/user-management/drivers/change-status', array('as' => 'changeDriverStatus','uses' => 'UserDriversManagementController@changeDriverStatus'));

    Route::resource('/home/user-management/customer', 'CustomerUserManagementController', [
        'except' => ['index','store', 'create','edit','destroy'],
        'parameters' => ['customer' => 'customer_user']
    ]);
    Route::post('/home/user-management/customer/change-status', array('as' => 'changeCustomerStatus','uses' => 'CustomerUserManagementController@changeCustomerStatus'));
    /****************************************************/

    Route::resource('/home/test', 'TestController');
    Route::resource('/home/testing', 'TestingController');

    Route::resource('/home/reservations', 'ReservationsController', [
        'except' => ['show', 'edit']
    ]);

    Route::get('/home/archive', 'HomeController@archive')->name('archive.index');
    Route::get('/home/operatorVanDriver/{operator}', 'HomeController@vanDriver')->name('archive.vanDriver');
    Route::get('/home/archive/profile/{archive}','HomeController@showProfile')->name('archive.showProfile');
    Route::patch('/home/operators/{driver}/archiveDelete', 'DriversController@archiveDelete')->name('drivers.archiveDelete');
    Route::post('/home/operators/{archive}/archiveOperators', 'OperatorsController@archiveOperator')->name('operators.archiveOperator');



    Route::resource('/home/rental', 'RentalsController',[
        'except' => ['show','edit']
    ]);


    /* Trips */
    Route::post('/home/trips/{destination}/{van}/{member}', 'TripsController@store')->name('trips.store');
    Route::get('/listSpecialUnits/{terminal}','TripsController@listSpecialUnits')->name('trips.listSpecialUnits');

    Route::patch('/home/trips/{trip}', 'TripsController@updateRemarks')->name('trips.updateRemarks');
    Route::patch('/home/trips/changeDestination/{trip}', 'TripsController@updateDestination')->name('trips.updateDestination');

    Route::resource('/home/trips', 'TripsController',[
        'except' => ['create','show','edit','update']
    ]);
    Route::post('/vanqueue', 'TripsController@updateVanQueue')->name('trips.updateVanQueue');
    Route::get('/showTrips/{terminal}', 'TripsController@showTrips');
    Route::patch('/updateQueueNumber/{trip}', 'TripsController@updateQueueNumber')->name('trips.updateQueueNumber');
    Route::post('/specialUnitChecker','TripsController@specialUnitChecker')->name('trips.specialUnitChecker');
    Route::get('/updatedQueueNumber','TripsController@updatedQueueNumber')->name('trips.updatedQueueNumber');
    Route::post('/putOnDeck/{trip}','TripsController@putOnDeck')->name('trips.putOnDeck');
    /* Transactions(Ticket) */
    Route::resource('/home/transactions', 'TransactionsController',[
        'except' => ['create','show','edit']
    ]);
    Route::patch('/home/transactions/{terminal}', 'TransactionsController@update')->name('transactions.update');
    Route::get('/listDestinations/{terminal}','TransactionsController@listDestinations')->name('transactions.listDestinations');
    Route::get('/listDiscounts','TransactionsController@listDiscounts')->name('transactions.listDiscounts');
    Route::get('/listTickets/{terminal}','TransactionsController@listTickets')->name('transactions.listTickets');
    Route::patch('/updatePendingTransactions', 'TransactionsController@updatePendingTransactions')->name('transactions.updatePendingTransactions');
    Route::patch('/updateOnBoardTransactions', 'TransactionsController@updateOnBoardTransactions')->name('transactions.updateOnBoardTransactions');
    /********Archive ********/
    Route::patch('/home/vans/{van}/archiveVan', 'VansController@archiveDelete')->name('vans.archiveDelete');
    Route::get('/showConfirmationBox/{encodedTrips}','TripsController@showConfirmationBox');

    Route::get('/drivers/generatePDF', 'DriversController@generatePDF')->name('pdf.drivers');
    Route::get('/operators/generatePDF', 'OperatorsController@generatePDF')->name('pdf.operators');
    Route::get('/drivers/generatePerDriver/{driver}', 'DriversController@generatePerDriver')->name('pdf.perDriver');
    Route::get('/drivers/generatePerOperator/{operator}', 'OperatorsController@generatePerOperator')->name('pdf.perOperator');
     
    Route::get('/home/trip-log', 'TripsController@tripLog')->name('trips.tripLog');
    Route::get('/home/driver-report', 'TripsController@driverReport')->name('trips.driverReport');

    Route::resource('/home/ledger', 'LedgersController');


 });
/*****************************************************************************/
/*****************************************************************************/



/*************************************Driver Module****************************/
/******************************************************************************/
Route::group(['middleware' => ['auth', 'driver']], function(){
  /*Driver Dashboard*/
  Route::get('/home/driver-dashboard', 'DriverModuleControllers\DriverHomeController@index')->name('drivermodule.index');
  /*AJAX GET for queue and announcements*/
  Route::get('/home/view-queue', 'DriverModuleControllers\ViewVanQueueController@showVanQueue')->name('drivermodule.viewQueue');
  Route::get('/home/view-announcement', 'DriverModuleControllers\ViewAnnouncementsController@showAnnouncement')->name('drivermodule.viewAnnouncement');
  /*Driver Profile*/
  Route::get('/home/profile', 'DriverModuleControllers\DriverProfileController@showDriverProfile')->name('drivermodule.profile.driverProfile');
  Route::post('/home/profile', 'DriverModuleControllers\DriverProfileController@changeNotificationStatus')->name('drivermodule.notification');
  /*Change Password*/

  Route::patch('/home/profile/change-password/{driverid}', 'DriverModuleControllers\DriverProfileController@updatePassword')->name('drivermodule.changePassword');
  Route::post('home/profile/change-password', 'DriverModuleControllers\DriverProfileController@checkCurrentPassword')->name('drivermodule.checkCurrentPassword');
  /*Create Report*/
  Route::get('/home/choose-terminal', 'DriverModuleControllers\CreateReportController@chooseTerminal')->name('drivermodule.report.driverChooseDestination');
  Route::get('/home/create-report/{terminals}', 'DriverModuleControllers\CreateReportController@createReport')->name('drivermodule.createReport');
  Route::post('/home/create-report/{terminal}/store', 'DriverModuleControllers\CreateReportController@storeReport')->name('drivermodule.storeReport');
  /*Trip Log*/
  Route::get('/home/view-trips', 'DriverModuleControllers\TripLogController@viewTripLog')->name('drivermodule.triplog.driverTripLog');

});
/******************************************************************************/
/******************************************************************************/
Route::get('/home/try', 'PassController@index');

/*********************************Customer Module******************************/
/******************************************************************************/

Route::get('/about', 'CustomerModuleControllers\CustomerNonUserHomeController@aboutNonUser')->name('customermodule.non-user.about.customerAbout');

Route::group(['middleware' => ['auth', 'customer']], function(){
    Route::get('/home', 'CustomerModuleControllers\CustomerUserHomeController@index')->name('customermodule.user.index');
});
/******************************************************************************/
/******************************************************************************/
