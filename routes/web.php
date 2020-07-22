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
Route::group(['middleware' => ['auth']], function () {
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/', 'HomeController@index')->name('home');
Route::get('chart','HomeController@chart')->name('chart');
// Owner info  route
Route::resource('owner','OwnerController');
// owner bus info
Route::resource('ownerbus','OwnerBusInfoController');
// owner advance
Route::resource('owneradvance','OwnerAdvanceController');

// car info
Route::resource('bus','CarInfoController');
// Driving info
Route::resource('driver','DriverController');
/// helper info
Route::resource('helper','HelperController');
// cheaker info
Route::resource('checker','CheackerController');
// gp cost route
Route::resource('gpcost','GpController');
Route::get('gpcost-all','GpController@show')->name('gpcost-all');
// Today checker
Route::resource('todaycheck','TodayCheckerController');
Route::get('all-info','TodayCheckerController@info')->name('todayall-info');
// todaydriverhelper
Route::resource('driverhelper','TodayDriverHelperController');
Route::get('driverhelpers','TodayDriverHelperController@info')->name('all-driverhelper');
// Counterman
Route::resource('counterman','CounterManController');
// Checkpost Route
Route::resource('checkpost','CheckPostController');
// Counter Route
Route::resource('counter','CounterController');
// Cost List
	// buscostlist
	Route::resource('costlist','CostListController');
	// countercostlist
	Route::resource('countercostlist','CounterCostlistController');
	// counter cost add
	Route::resource('countercostadd','CounterCostAddController');
	Route::get('countercostadd-all','CounterCostAddController@countercostadd_all')->name('countercostadd-all');
// Cost addd
Route::resource('costadd','CostAddController');
Route::get('costadd-all-info','CostAddController@all_info')->name('costadd-all-info');
// Ticket sell
// Route::resource('ticketearn','TicketIncomeController');
// Route::get('/all-ticket-list','TicketIncomeController@all_list')->name('all-ticket-list');
// Accessories Earn
Route::resource('accessories','AccessoriesController');
Route::get('accessories-list','AccessoriesController@all_list')->name('accessories-list');
// Today checker
Route::get('/t-checker-add', 'TodayCheckerController@index')->name('t-checker-add');
Route::get('/t-checker-list','TodayCheckerController@info')->name('t-checker-list');
Route::get('/t-checker-all-list','TodayCheckerController@create')->name('t-checker-all-list');
Route::resource('counter-details','CounterInformationController');


// $$$$$$ .....cartrip Route...... $$$$$$$$ //
Route::resource('cartrip','CarTripController');
Route::get('cartripall','CarTripController@info')->name('cartripall');

// ****  All salary Route Start  **** //

	// countermansalary :-
	// Route::resource('countermansalary','CountermanSalaryController');
	// Route::get('coumansalary','CountermanSalaryController@all_info')->name('csall-info');
	// driversalary :-
	// Route::resource('driversalary','DriverSalaryController');
	// Route::get('drisalary','DriverSalaryController@all_info')->name('all-info');
	// helpersalary :-
	// Route::resource('helpersalary','HelperSalaryController');
	// Route::get('helpsalary','HelperSalaryController@all_info')->name('hsall-info');
	// linemansalary :-
	// Route::resource('linemansalary','LinemanSalaryController');
   // Route::get('linesalary','LinemanSalaryController@all_info')->name('lsall-info');


   Route::resource('allearn','TotalearnController');
   Route::get('totalearn','TotalearnController@all_earn_list')->name('all-earn-list');

   Route::resource('allbuscost','AllBusCostController');
   Route::get('allbuscostshow','AllBusCostController@allinfo')->name('allbuscostshow');

   Route::resource('allcountercost','AllCounterCostController');
   Route::get('allcountercostshow','AllCounterCostController@allinfo')->name('allcountercostshow');

// ****  All salary Route End  **** //


// All-Income Route
Route::prefix('earn')->group(function () {
   Route::get('/today','AllincomeController@today')->name('today');
   Route::get('/week','AllincomeController@week')->name('week');
   Route::get('/month','AllincomeController@month')->name('month');
   Route::get('/year','AllincomeController@year')->name('year');
   Route::get('/total','AllincomeController@total')->name('total');
});
// All-cost Route
Route::prefix('cost')->group(function () {
   Route::get('/today','AllCostController@today')->name('today1');
   Route::get('/week','AllCostController@week')->name('week1');
   Route::get('/month','AllCostController@month')->name('month1');
   Route::get('/year','AllCostController@year')->name('year1');
   Route::get('/total','AllCostController@total')->name('total1');
   Route::get('/today-all','AllCostController@today_all')->name('today-all');
   Route::get('/week-all','AllCostController@week_all')->name('week-all');
   Route::get('/month-all','AllCostController@month_all')->name('month-all');
   Route::get('/year-all','AllCostController@year_all')->name('year-all');
   Route::get('/total-all','AllCostController@total_all')->name('total-all');
});
// All Profit Route
Route::prefix('profit')->group(function () {
   Route::get('/todayprofit','AllProfitController@todayprofit')->name('todayprofit');
});
//  counter information route
Route::prefix('counterinfo')->group(function () {
   Route::get('/today','CounterInformationController@Todaycount')->name('today2');
   Route::get('/week','CounterInformationController@Weekcount')->name('week2');
   Route::get('/month','CounterInformationController@Monthcount')->name('month2');
   Route::get('/year','CounterInformationController@Yearcount')->name('year2');
   Route::get('/total','CounterInformationController@totalcount')->name('total2');
});

// eachbus income route
  Route::resource('eachbusincome','EachbusIncomeController');

  Route::prefix('eachbus')->group(function () {
   Route::get('/weekeach','EachbusIncomeController@Weekeach')->name('weekeach');
   Route::get('/montheach','EachbusIncomeController@Montheach')->name('montheach');
   Route::get('/yeareach','EachbusIncomeController@Yeareach')->name('yeareach');
   Route::get('/totaleach','EachbusIncomeController@Totaleach')->name('totaleach');
});


// sms route start
  Route::get('sms','SmsController@create')->name('sms.create');
  Route::get('sendsms','SmsController@Sendsms')->name('sms.sendsms');
  Route::post('smsstore','SmsController@smsstore')->name('sms.smsstore');
  Route::post('/send-sms', 'SmsController@getUserNumber');

//   message route

  Route::get('ownermsg','Message\OwnerMessage@index')->name('ownermsg');
  Route::post('ownermsgsend','Message\OwnerMessage@store')->name('ownermsgsend');
  Route::get('ownerinfo','Message\OwnerMessage@info')->name('ownerinfo');

  Route::get('drivermsg','Message\DriverMessage@index')->name('drivermsg');
  Route::post('drivermsgsend','Message\DriverMessage@store')->name('drivermsgsend');
  Route::get('driverinfo','Message\DriverMessage@info')->name('driverinfo');

  Route::get('helpermsg','Message\HelperMessage@index')->name('helpermsg');
  Route::post('helpermsgsend','Message\HelperMessage@store')->name('helpermsgsend');
  Route::get('helperinfo','Message\HelperMessage@info')->name('helperinfo');

  Route::get('countermanmsg','Message\CountermanMessage@index')->name('countermanmsg');
  Route::post('countermanmsgsend','Message\CountermanMessage@store')->name('countermanmsgsend');
  Route::get('countermaninfo','Message\CountermanMessage@info')->name('countermaninfo');


  Route::prefix('report')->group(function () {
   Route::get('/daydriver','Report\ReportController@daydriver')->name('daydriver');
   Route::get('/weekdriver','Report\ReportController@weekdriver')->name('weekdriver');
   Route::get('/monthdriverreport','Report\ReportController@montdriver')->name('monthdriverreport');
   Route::get('/dayhelper','Report\ReportController@dayhelper')->name('dayhelper');
   Route::get('/weekhelper','Report\ReportController@weekhelper')->name('weekhelper');
   Route::get('/monthhelper','Report\ReportController@monthhelper')->name('monthhelper');

   Route::get('/daylineman','Report\ReportController@daylineman')->name('daylineman');
   Route::get('/weeklineman','Report\ReportController@weeklineman')->name('weeklineman');
   Route::get('/monthlineman','Report\ReportController@monthlineman')->name('monthlineman');

   Route::get('/daycounterman','Report\ReportController@daycounterman')->name('daycounterman');
   Route::get('/weekcounterman','Report\ReportController@weekcounterman')->name('weekcounterman');
   Route::get('/monthcounterman','Report\ReportController@monthcounterman')->name('monthcounterman');
   Route::get('/monthincomereport','Report\ReportController@monthincomereport')->name('monthincomereport');
   Route::get('/monthkhorochreport','Report\ReportController@monthkhorochreport')->name('monthkhorochreport');


});

});

